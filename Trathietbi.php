<?php
include 'ketnoi.php';

if (isset($_GET['maphieu'])) {
    $maphieu = $_GET['maphieu'];
    $ngay    = date('Y-m-d H:i:s');
    
    $sql_update = "UPDATE phieu_muon SET TrangThai = 'Đã trả', NgayTra = '$ngay' WHERE MaPhieuMuon = '$maphieu'";
    mysqli_query($ketnoi, $sql_update);

    $sql_lichsu = "INSERT INTO bang_lich_su_muon_tra (MaNguoiDung, MaPhieuMuon, HanhDong, ThoiGian, NguoiThucHien) 
                   VALUES ('GV', '$maphieu', 'GV tra', '$ngay', 'GiangVien')";
    mysqli_query($ketnoi, $sql_lichsu);

    $sql_delete = "DELETE FROM thiet_bi_muon WHERE MaPhieuMuon = '$maphieu'";
    mysqli_query($ketnoi, $sql_delete);
}

header("Location: Lichsu.php");
exit();
?>