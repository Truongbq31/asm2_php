<?php
namespace App\Controllers;
use App\Models\m_account;

class c_login extends BaseController{
    public $m_account;
    public function __construct()
    {
        $this->m_account = new m_account();
    }
    public function check_login(){
        return $this->render("login_logout.v_login");
    }
    public function post_check_login(){
        if (isset($_POST['btn_login'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $accounts = $this->m_account->getAccount();
            foreach ($accounts as $value){
                if ($value->username == $username && $value->password == $password && $value->trang_thai == 1){
                    $_SESSION["username"] = $username;
                }
                if ($value->username == $username && $value->password == $password && $value->trang_thai == 0){
                    $_SESSION['trang_thai'] = "block";
                }
            }
            if (isset($_SESSION['username'])){
                noti("noti", "Xin chào $username!", "list-phim");
            }elseif (isset($_SESSION['trang_thai'])){
                unset($_SESSION['trang_thai']);
                noti("noti", "Tài khoản hiện đang bị khóa!", "login");
            }else{
                noti("noti", "Tài khoản hoặc mật khẩu không chính xác", "login");
            }
        }
    }

    public function logout(){
        session_destroy();
        header("location:".route("login"));
    }
}
