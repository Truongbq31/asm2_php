<?php
namespace App\Controllers;
use App\Models\m_account;

class c_account extends BaseController{
    public $m_account;
    public function __construct()
    {
        $this->m_account = new m_account();
    }
    public function list_account(){
        $account = $this->m_account->getAccount();
        return $this->render("account.v_account", compact("account"));
    }
    public function update_account(){
        if (isset($_GET['btn_active'])){
            $id = $_GET['id_acc'];
            $trang_thai = 1;
            $result = $this->m_account->updateAccount($id, $trang_thai);
            if ($result){
                noti("noti", "Cập nhật trạng thái thành công!", "list-acc");
            }
        }

        if (isset($_GET['btn_block'])){
            $id = $_GET['id_acc'];
            $trang_thai = 0;
            $result = $this->m_account->updateAccount($id, $trang_thai);
            if ($result){
                noti("noti", "Cập nhật trạng thái thành công!", "list-acc");
            }
        }
    }

    public function sign_up(){
        return $this->render("login_logout.v_signup");
    }
    public function post_sign_up(){
        if (isset($_POST['btn_signup'])){
            $id = null;
            $username = $_POST['username'];
            $password = "";
            $email = $_POST['email'];
            $trang_thai = 1;

            //validate
            $flag = true;
            if ($_POST['password'] == $_POST['confirm_password']){
                $password = $_POST['password'];
            }else{
                $flag=false;
                header("location:".route("signup?error_pass"));
            }

            $accounts = $this->m_account->getAccount();
            foreach ($accounts as $values){
                if ($values->username == $username){
                    $flag = false;
                    header("location:".route("signup?error_user"));
                }
                if ($values->email == $email){
                    $flag = false;
                    header("location:".route("signup?error_email"));
                }
            }

            if ($flag){
                $result = $this->m_account->signup($id, $username, md5($password), $email, $trang_thai);
            }
            if ($result){
                noti("noti", "Đăng kí tài khoản thành công!", "login");
            }
        }
    }
}
