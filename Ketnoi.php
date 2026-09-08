<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

$ketnoi = mysqli_connect("localhost", "root", "", "quanlymuontrathietbi");
if(!$ketnoi){
echo "loi ket noi mang";
exit();
}
mysqli_set_charset($ketnoi,"utf8");

$id_gv = 11;
if(isset($_SESSION['user_id'])){
$id_gv = $_SESSION['user_id'];
}
else if(isset($_GET['id'])){
$id_gv = $_GET['id'];
}

$hoten = "Chua cap nhat";
$chuoitruyvan = "SELECT * FROM nguoi_dung WHERE MaNguoiDung = '".$id_gv."'";
$chay = mysqli_query($ketnoi, $chuoitruyvan);

if(mysqli_num_rows($chay) > 0){
$dong = mysqli_fetch_assoc($chay);
$hoten = $dong['HoTen'];
}
?>