<?php
include 'ketnoi.php';
if(isset($_GET['matb']) && isset($_GET['phong'])){
$matb = $_GET['matb'];
$phong = $_GET['phong'];
$ngay = date('Y-m-d H:i:s');

$laydo = mysqli_query($ketnoi, "SELECT SoLuong FROM thiet_bi WHERE MaThietBi = '".$matb."'");
if(mysqli_num_rows($laydo) > 0){
$d = mysqli_fetch_assoc($laydo);
if($d['SoLuong'] > 0){
$sql_tao = "INSERT INTO phieu_muon (MaNguoiDung, MaThietBi, MaPhong, NgayMuon, TrangThai) 
VALUES ('".$id_gv."', '".$matb."', '".$phong."', '".$ngay."', 'Đã duyệt (GV)')";
if(mysqli_query($ketnoi, $sql_tao)){
$id_moi = mysqli_insert_id($ketnoi);
//mysqli_query($ketnoi, "UPDATE thiet_bi SET SoLuong = SoLuong - 1 WHERE MaThietBi = '".$matb."'");

//Code thế này chịu thua
//Insert số lượng thiết bị đang sử dụng
$maphieumuon = mysqli_insert_id($ketnoi);
$search = mysqli_query($ketnoi,"
            SELECT * FROM thiet_bi
            WHERE MaThietBi = '$matb'
        ");
//Lấy thông tin thiết bị
$result = mysqli_fetch_assoc($search);
//Tạo phiếu đang mượn để tính toán số lượng còn trong kho

//Lấy ID tự động tạo qua API mysqli_insert_id(<db>)
mysqli_query($ketnoi,"
    INSERT INTO thiet_bi_muon
        (MaPhieuMuon, MaNguoiDung, MaThietBi, MaPhong, TenThietBi, SoLuong)
    VALUES
        ('$maphieumuon', '$id_gv', '{$result['MaThietBi']}', '$phong', '{$result['TenThietBi']}', 1 )
");

$check = mysqli_query($ketnoi, "SHOW COLUMNS FROM bang_lich_su_muon_tra LIKE 'MaPhieuMuon'");
if(mysqli_num_rows($check) > 0){
mysqli_query($ketnoi, "INSERT INTO bang_lich_su_muon_tra (MaNguoiDung, MaPhieuMuon, HanhDong, ThoiGian, NguoiThucHien) 
VALUES ('".$id_gv."', '".$id_moi."', 'GV muon', '".$ngay."', 'GiangVien')");
}
}
}
}
}

header("Location: Lichsu.php");
?>