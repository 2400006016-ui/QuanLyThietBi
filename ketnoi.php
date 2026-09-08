<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "quanlymuontrathietbi";

$ketnoi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$ketnoi) {
    die("Lỗi kết nối CSDL");
}

mysqli_set_charset($ketnoi, "utf8");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'SinhVien') {
    header("Location: login.php");
    exit();
}
?>