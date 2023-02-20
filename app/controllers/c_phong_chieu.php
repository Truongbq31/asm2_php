<?php
namespace App\Controllers;
use App\Models\m_chi_nhanh;
use App\Models\m_phong_chieu;

class c_phong_chieu extends BaseController{
    public $m_phong_chieu;
    public $m_chi_nhanh;
    public function __construct()
    {
        $this->m_phong_chieu = new m_phong_chieu();
        $this->m_chi_nhanh = new m_chi_nhanh();
    }
    public function list_phong_chieu(){
        $phong_chieu = $this->m_phong_chieu->getPhongChieu();
        return $this->render("phong_chieu.v_phong_chieu", compact("phong_chieu"));
    }
    public function del_phong_chieu($id){
        $result = $this->m_phong_chieu->deletePhongChieu($id);
        if ($result){
            noti("noti", "Xóa phòng thành công!", "list-pc");
        }
    }
    public function add_phong_chieu(){
        $chi_nhanh = $this->m_chi_nhanh->getChiNhanh();
        $this->render("phong_chieu.v_add_phong_chieu", compact('chi_nhanh'));
    }
    public function post_add_phong(){
        $id = null;
        $ten_phong = $_POST['ten_phong'];
        $id_chi_nhanh = $_POST['id_chi_nhanh'];

        //validate
        $flag = true;
        $phong_chieu = $this->m_phong_chieu->getPhongChieu();
        foreach ($phong_chieu as $value){
            if ($value->ten_phong == $ten_phong && $value->id_chi_nhanh == $id_chi_nhanh){
                $flag=false;
            }
        }
        if ($flag){
            $this->m_phong_chieu->addPhongChieu($id, $ten_phong, $id_chi_nhanh);
            noti("noti", "Thêm phòng chiếu $ten_phong vào chi nhánh $value->ten_chi_nhanh thành công!", "list-pc");
        }else{
            noti("noti", "Phòng chiếu $ten_phong đã có tại chi nhánh $value->ten_chi_nhanh!", "add-pc");
        }
    }

    public function edit_phong_chieu(){
        $id = $_GET['id_pc'];
        $_SESSION['id_pc'] = $id;
        $chi_nhanh = $this->m_chi_nhanh->getChiNhanh();
        $pc_detail = $this->m_phong_chieu->read_phong_chieu_by_id($id);
        return $this->render("phong_chieu.v_edit_phong_chieu", compact("pc_detail","chi_nhanh"));
    }
    public function post_edit_phong(){
        if (isset($_POST['btn_save'])){
            $id = $_SESSION['id_pc'];
            $ten_phong = $_POST['ten_phong'];
            $id_chi_nhanh = $_POST['id_chi_nhanh'];
            $result = $this->m_phong_chieu->editPhongChieu($id, $ten_phong, $id_chi_nhanh);
            if ($result){
                noti("noti", "Sửa phòng chiếu thành công!", "list-pc");
            }
        }
    }
}
