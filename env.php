<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "assignment_gd2";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";


const BASE_URL = "http://localhost/ASM2/";
function route($name)
{
    return BASE_URL.$name;
}
function noti($key, $mess, $route){
    $_SESSION[$key] = $mess;
    header("location: ".route($route));
}
