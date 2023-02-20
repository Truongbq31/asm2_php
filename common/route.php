<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    if (!isset($_SESSION['username'])){
        header("location:".route("login"));
    }else{
        header("location:".route("list-phim"));
    }
});

//start

//chi_nhánh
$router->get('list-cn', [App\Controllers\c_chi_nhanh::class, 'list_chi_nhanh']);
$router->get('del-cn/{id}', [App\Controllers\c_chi_nhanh::class, 'delete_chi_nhanh']);
$router->get('add-cn', [App\Controllers\c_chi_nhanh::class, 'add_chi_nhanh']);
$router->post('post-add-cn', [App\Controllers\c_chi_nhanh::class, 'post_add_cn']);
$router->get('edit-cn', [App\Controllers\c_chi_nhanh::class, 'edit_chi_nhanh']);
$router->post('post-edit-cn', [App\Controllers\c_chi_nhanh::class, 'post_edit_cn']);

//loại phim
$router->get('list-loai-phim', [App\Controllers\c_loai_phim::class, 'list_loai_phim']);
$router->get('del-loai-phim/{id}', [App\Controllers\c_loai_phim::class, 'del_loai_phim']);
$router->get('add-loai-phim', [App\Controllers\c_loai_phim::class, 'add_loai_phim']);
$router->post('post-add-loai', [App\Controllers\c_loai_phim::class, 'post_add_loai']);
$router->get('edit-loai-phim', [App\Controllers\c_loai_phim::class, 'edit_loai_phim']);
$router->post('post-edit-loai', [App\Controllers\c_loai_phim::class, 'post_edit_phim']);

//phòng chiếu
$router->get('list-pc', [App\Controllers\c_phong_chieu::class, 'list_phong_chieu']);
$router->get('del-pc/{id}', [App\Controllers\c_phong_chieu::class, 'del_phong_chieu']);
$router->get('add-pc', [App\Controllers\c_phong_chieu::class, 'add_phong_chieu']);
$router->post('post-add-phong', [App\Controllers\c_phong_chieu::class, 'post_add_phong']);
$router->get('edit-pc', [App\Controllers\c_phong_chieu::class, 'edit_phong_chieu']);
$router->post('post-edit-pc', [App\Controllers\c_phong_chieu::class, 'post_edit_phong']);

//phim
$router->get('list-phim', [App\Controllers\c_phim::class, 'list_phim']);
$router->get('del-phim', [App\Controllers\c_phim::class, 'delete_phim']);
$router->get('add-phim', [App\Controllers\c_phim::class, 'add_phim']);
$router->post('post-add-phim', [App\Controllers\c_phim::class, 'post_add_phim']);
$router->get('edit-phim', [App\Controllers\c_phim::class, 'edit_phim']);
$router->post('post-edit-phim', [App\Controllers\c_phim::class, 'post_edit_phim']);

//suất chiếu
$router->get('list-suat-chieu', [App\Controllers\c_suat_chieu::class, 'list_suat_chieu']);
$router->get('del-suat-chieu', [App\Controllers\c_suat_chieu::class, 'delete_suat_chieu']);
$router->get('add-suat-chieu', [App\Controllers\c_suat_chieu::class, 'add_suat_chieu']);
$router->post('post-add-suat-chieu', [App\Controllers\c_suat_chieu::class, 'post_add_suat_chieu']);
$router->get('edit-suat-chieu', [App\Controllers\c_suat_chieu::class, 'edit_suat_chieu']);
$router->post('post-edit-suat-chieu', [App\Controllers\c_suat_chieu::class, 'post_edit_suat_chieu']);


//login - logout
$router->get('login', [App\Controllers\c_login::class, 'check_login']);
$router->post('post-check-login', [App\Controllers\c_login::class, 'post_check_login']);
$router->get('log-out', [App\Controllers\c_login::class, 'logout']);

//Account
$router->get('list-acc', [App\Controllers\c_account::class, 'list_account']);
$router->get('update-acc', [App\Controllers\c_account::class, 'update_account']);
$router->get('signup', [App\Controllers\c_account::class, 'sign_up']);
$router->post('post-signup', [App\Controllers\c_account::class, 'post_sign_up']);


//end

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>