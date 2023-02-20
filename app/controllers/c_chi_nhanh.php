<?php
namespace App\Controllers;
use App\Models\m_chi_nhanh;
use function Symfony\Component\Translation\t;

class c_chi_nhanh extends BaseController{
    public $m_chi_nhanh;
    public function __construct()
    {
        $this->m_chi_nhanh = new m_chi_nhanh();
    }
    public function list_chi_nhanh(){
        $chi_nhanh = $this->m_chi_nhanh->getChiNhanh();
        return $this->render("chi_nhanh.v_chi_nhanh",compact("chi_nhanh"));
    }
    public function delete_chi_nhanh($id){
        $result = $this->m_chi_nhanh->deleteChiNhanh($id);
        if ($result){
            noti("noti", "Xóa chi nhánh thành công!", "list-cn");
        }
    }

    public function add_chi_nhanh(){
        return $this->render("chi_nhanh.v_add_chi_nhanh");
    }

    public function post_add_cn(){
        if (isset($_POST['btn_add'])){
            $id = null;
            $ten_chi_nhanh = $_POST['ten_chi_nhanh'];

            //validate
            $chi_nhanh = $this->m_chi_nhanh->getChiNhanh();
            $flag = true;
            foreach ($chi_nhanh as $value){
                if ($value->ten_chi_nhanh == $ten_chi_nhanh){
                    $flag = false;
                }
            }
            if ($flag){
                $result = $this->m_chi_nhanh->addChiNhanh($id, $ten_chi_nhanh);
            }
            if ($result){
                noti("noti", "Thêm chi nhánh $ten_chi_nhanh thành công!", "list-cn");
            }else{
                noti("noti", "Chi nhánh $ten_chi_nhanh đã tồn tại trên server!", "add-cn");
            }
        }
    }

    public function edit_chi_nhanh(){
        $id = $_GET['id_cn'];
        $_SESSION['id'] = $id;
        $cn_detail = $this->m_chi_nhanh->read_cn_by_id($id);
        return $this->render("chi_nhanh.v_edit_chi_nhanh", compact("cn_detail"));
    }
    public function post_edit_cn(){
        $id = $_SESSION['id'];
        $ten_chi_nhanh = $_POST['ten_chi_nhanh'];
        $result = $this->m_chi_nhanh->editChiNhanh($id, $ten_chi_nhanh);

        if ($result){
            noti("noti","Sửa chi nhánh thành công!", "list-cn");
        }
    }

}