<?php
namespace App\Controllers;
use App\Models\m_loai_phim;

class c_loai_phim extends BaseController{
    public $m_loai_phim;
    public function __construct()
    {
        $this->m_loai_phim=new m_loai_phim();
    }
    public function list_loai_phim(){
        $loai_phim = $this->m_loai_phim->getLoaiPhim();
        return $this->render("loai_phim.v_loai_phim", compact('loai_phim'));
    }
    public function del_loai_phim($id){
        $result = $this->m_loai_phim->deleteLoaiPhim($id);
        if ($result){
            noti("noti", "Xóa thành công!", "list-loai-phim");
        }
    }
    public function add_loai_phim(){
        $this->render("loai_phim.v_add_loai_phim");
    }
    public function post_add_loai(){
        if (isset($_POST['btn_add'])){
            $id = null;
            $ten_loai = $_POST['ten_loai'];
            //validate
            $loai_phim = $this->m_loai_phim->getLoaiPhim();
            $flag = true;
            foreach ($loai_phim as $value){
                if ($ten_loai == $value->ten_loai){
                    $flag=false;
                }
            }
            if ($flag){
                $resutl = $this->m_loai_phim->addLoaiPhim($id, $ten_loai);
            }
            if ($resutl){
                noti("noti", "Thêm $ten_loai thành công!", "list-loai-phim");
            }else{
                noti("noti", "Loại phim $ten_loai đã tồn tại trên Server!", "add-loai-phim");
            }
        }
    }

    public function edit_loai_phim(){
        $id = $_GET['id_loai'];
        $_SESSION['id_loai'] = $id;
        $detail = $this->m_loai_phim->read_loai_by_id($id);
        return $this->render("loai_phim.v_edit_loai_phim", compact('detail'));
    }
    public function post_edit_phim(){
        $id = $_SESSION['id_loai'];
        $ten_loai = $_POST['ten_loai'];
        $result = $this->m_loai_phim->editLoaiPhim($id, $ten_loai);
        if ($result){
            noti("noti", "Sửa thành công!","list-loai-phim");
        }
    }
}
