<?php
include 'ketnoi.php';

if (isset($_POST['noidung'])) {
    $nd   = mysqli_real_escape_string($ketnoi, $_POST['noidung']);
    $ngay = date('Y-m-d H:i:s');

    if ($nd != "") {
        $rs       = mysqli_query($ketnoi, "SELECT MaNguoiDung FROM nguoi_dung WHERE Quyen = 'Admin' LIMIT 1");
        //$admin_id = mysqli_fetch_assoc($rs)['MaNguoiDung'];

        mysqli_query($ketnoi, "INSERT INTO thong_bao_nhac_nho (ma_nguoi_dung, tieu_de, noi_dung, thoi_gian, da_doc)
                               VALUES (-1, 'GV nhắn', '$nd', '$ngay', 0)");
    }
}

header("Location: Thongbao.php");
exit;
?>