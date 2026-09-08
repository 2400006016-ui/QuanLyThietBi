<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

$db = mysqli_connect("localhost", "root", "", "quanlymuontrathietbi");
if(!$db){
    echo "Khong ket noi duoc csdl";
    exit();
}
mysqli_set_charset($db, "utf8");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>