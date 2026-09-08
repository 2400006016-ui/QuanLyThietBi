<?php
include 'ketnoi.php';

if (isset($_POST['MaThietBi']) && isset($_POST['MaPhong'])) {
    $matb = $_POST['MaThietBi'];
    $tentb = $_POST['TenThietBi'];
    $maphong = $_POST['MaPhong'];

    $user_id = $_SESSION['user_id'];
    $now = date('Y-m-d H:i:s');

    $sql = "INSERT INTO phieu_muon (MaNguoiDung, MaThietBi, TenThietBi, MaPhong, SoLuong, NgayMuon, TrangThai) 
            VALUES ('$user_id', '$matb', '$tentb', '$maphong', 1, '$now', 'Chờ duyệt')";

    if (mysqli_query($ketnoi, $sql)) {
        header("Location: lichsu.php?msg=Gui phieu muon thanh cong");
    } else {
        echo "Lỗi mượn thiết bị";
    }
} else {
    header("Location: thietbi.php");
}
?>