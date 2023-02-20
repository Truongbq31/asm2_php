<?php
namespace App\Controllers;
use App\Models\m_phim;
use App\Models\m_phong_chieu;
use App\Models\m_suat_chieu;

class c_suat_chieu extends BaseController{
    public $m_suat_chieu;
    public $m_phim;
    public $m_phong_chieu;
    public function __construct()
    {
        $this->m_suat_chieu = new m_suat_chieu();
        $this->m_phim = new m_phim();
        $this->m_phong_chieu = new m_phong_chieu();
    }
    public function list_suat_chieu(){
        $suat_chieu = $this->m_suat_chieu->getSuatChieu();
        return $this->render("suat_chieu.v_suat_chieu", compact("suat_chieu"));
    }
    public function delete_suat_chieu(){
        $id = $_GET['id_sc'];
        $result = $this->m_suat_chieu->deleteSuatChieu($id);
        if ($result){
            noti("noti", "Xóa suất chiếu thành công!", "list-suat-chieu");
        }
    }

    public function add_suat_chieu(){
        $phim = $this->m_phim->getPhim();
        $phong_chieu = $this->m_phong_chieu->getPhongChieu();
        return $this->render("suat_chieu.v_add_suat_chieu", compact("phong_chieu", "phim"));
    }
    public function post_add_suat_chieu(){
        if (isset($_POST['btn_add'])){
            $id = null;
            $id_phim = $_POST['id_phim'];
            $id_phong_chieu = $_POST['id_phong_chieu'];

            //validate
            $flag = true;
            $suat_chieu = $this->m_suat_chieu->getSuatChieu();
            foreach ($suat_chieu as $value){
                if ($value->id_phim == $id_phim && $value->id_phong_chieu == $id_phong_chieu){
                        $flag=false;
                        noti("noti", "Suất chiếu đã tồn tại trên server!", "add-suat-chieu");
                }
            }
            if ($flag){
                $this->m_suat_chieu->addSuatChieu($id, $id_phim, $id_phong_chieu);
                noti("noti", "Thêm suất chiếu thành công!", "list-suat-chieu");
            }
        }
    }

    public function edit_suat_chieu(){
        $id = $_GET['id_sc'];
        $_SESSION['id_sc'] = $id;
        $suat_chieu_detail = $this->m_suat_chieu->read_suat_chieu_by_id($id);
        $phim = $this->m_phim->getPhim();
        $phong_chieu = $this->m_phong_chieu->getPhongChieu();
        return $this->render("suat_chieu.v_edit_suat_chieu", compact("suat_chieu_detail", "phim", "phong_chieu"));

    }
    public function post_edit_suat_chieu(){
        if (isset($_POST['btn_save'])){
            $id = $_SESSION['id_sc'];
            $id_phim = $_POST['id_phim'];
            $id_phong_chieu = $_POST['id_phong_chieu'];
            $result = $this->m_suat_chieu->editSuatChieu($id, $id_phim, $id_phong_chieu);
            if ($result){
                noti("noti", "Sửa suất chiếu thành công!", "list-suat-chieu");
            }
        }
    }
}