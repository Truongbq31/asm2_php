<?php
namespace App\Controllers;
use App\Models\m_loai_phim;
use App\Models\m_phim;

class c_phim extends BaseController{
    public $m_phim;
    public $m_loai_phim;
    public function __construct()
    {
        $this->m_phim = new m_phim();
        $this->m_loai_phim = new m_loai_phim();
    }
    public function list_phim(){
        $phim = $this->m_phim->getPhim();
        return $this->render("phim.v_phim", compact('phim'));
    }
    public function delete_phim(){
        $id = $_GET['id_phim'];
        $result = $this->m_phim->deletePhim($id);
        if ($result){
            noti("noti", "Xóa Phim thành công!", "list-phim");
        }
    }
    public function add_phim(){
        $loai_phim = $this->m_loai_phim->getLoaiPhim();
        return $this->render("phim.v_add_phim", compact("loai_phim"));
    }
    public function post_add_phim(){
        if (isset($_POST['btn_add'])){
            $id = null;
            $ten_phim = $_POST['ten_phim'];
            $description = $_POST['description'];
            $id_loai_phim = $_POST['id_loai_phim'];

            if (isset($_FILES['img'])){
                $allowUpload = true;
                $img = $_FILES['img']['name'];
                $targetDir = "source/img/";
                $targetFile = $targetDir.$img;
                $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
                $allowTypes = ['jpg', 'png', 'jpeg'];
                if (!in_array($imageFileType, $allowTypes)){
                    $allowUpload = false;
                    noti("noti", "Đuôi file $imageFileType không được phép upload!", "add-phim");
                }

                //validate phim
                $phim = $this->m_phim->getPhim();
                foreach ($phim as $value){
                    if ($ten_phim == $value->ten_phim && $img==$value->img
                        && $description==$value->description
                        && $id_loai_phim==$value->id_loai_phim){
                        $allowUpload = false;
                        noti("noti", "Phim $ten_phim đã tồn tại trên server!", "add-phim");
                    }
                }
                if ($allowUpload){
                    move_uploaded_file($_FILES['img']['tmp_name'], $targetFile);
                    $result = $this->m_phim->addPhim($id, $ten_phim, $img, $description, $id_loai_phim);
                }
                if ($result){
                    noti("noti", "Thêm phim $ten_phim thành công!", "list-phim");
                }
            }
        }
    }

    public function edit_phim(){
        $id = $_GET['id_phim'];
        $_SESSION['id_phim'] = $id;
        $phim_detail = $this->m_phim->read_phim_by_id($id);
        $loai_phim = $this->m_loai_phim->getLoaiPhim();
        return $this->render("phim.v_edit_phim", compact("phim_detail", "loai_phim"));
    }

    public function post_edit_phim(){
        if (isset($_POST['btn_save'])){
            $id = $_SESSION['id_phim'];
            $ten_phim = $_POST['ten_phim'];
            $description = $_POST['description'];
            $id_loai_phim = $_POST['id_loai_phim'];

            if (isset($_FILES['img'])){
                $allowUpload = true;
                $phim_detail = $this->m_phim->read_phim_by_id($id);
                $img = empty($_FILES['img']['name']) ? $phim_detail->img : $_FILES['img']['name'];
                $targetDir = "source/img/";
                $targetFile = $targetDir.$img;
                $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
                $allowTypes = ['jpg', 'png', 'jpeg', ''];
                if (!in_array($imageFileType, $allowTypes)){
                    $allowUpload = false;
                    noti("noti", "Đuôi file $imageFileType không được phép upload!", "add-phim");
                }
                if ($allowUpload){
                    move_uploaded_file($_FILES['img']['tmp_name'], $targetFile);
                    $result = $this->m_phim->editPhim($id, $ten_phim, $img, $description, $id_loai_phim);
                }
                if ($result){
                    noti("noti", "Cập nhật phim $phim_detail->ten_phim thành công!", "list-phim");
                }
            }
        }
    }
}
