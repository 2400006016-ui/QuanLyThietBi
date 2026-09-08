<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
date_default_timezone_set('Asia/Ho_Chi_Minh');

$conn = mysqli_connect("localhost", "root", "", "quanlymuontrathietbi");
if (!$conn) {
    die("Ket noi that bai");
}
mysqli_set_charset($conn, "utf8");
?>