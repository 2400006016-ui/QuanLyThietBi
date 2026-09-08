<?php
include 'ketnoi_muon.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $matbi = "";
    if(isset($_POST['MaThietBi'])){
        $matbi = $_POST['MaThietBi'];
    }

    $maphonghoc = "";
    if(isset($_POST['MaPhong'])){
        if($_POST['MaPhong'] != ""){
            $maphonghoc = $_POST['MaPhong'];
        }
    }
    if($maphonghoc == ""){
        if(isset($_GET['phong'])){
            $maphonghoc = $_GET['phong'];
        }
    }

    $nguoidung_id = $_SESSION['user_id'];
    $baygio = date('Y-m-d H:i:s');

    if($maphonghoc == ""){
        $cauhoi = "SELECT MaPhong FROM thiet_bi WHERE MaThietBi = '".$matbi."'";
        $thuchien_ hoi = mysqli_query($db, $cauhoi);
        if(mysqli_num_rows($thuchien_hoi) > 0){
            $laydong = mysqli_fetch_assoc($thuchien_hoi);
            $maphonghoc = $laydong['MaPhong'];
        }
    }

    if($matbi != ""){
        $them_phieu = "INSERT INTO phieu_muon (MaNguoiDung, MaThietBi, MaPhong, NgayMuon, TrangThai) VALUES ('".$nguoidung_id."', '".$matbi."', '".$maphonghoc."', '".$baygio."', 'Chờ duyệt')";
        
        $chay_them = mysqli_query($db, $them_phieu);
        
        if($chay_them){
            $phieu_vừa_tạo = mysqli_insert_id($db);

            $kt_bang_log = mysqli_query($db, "SHOW COLUMNS FROM bang_lich_su_muon_tra LIKE 'MaPhieuMuon'");
            if(mysqli_num_rows($kt_bang_log) > 0){
                $ghi_log = "INSERT INTO bang_lich_su_muon_tra (MaNguoiDung, MaPhieuMuon, HanhDong, ThoiGian, NguoiThucHien) VALUES ('".$nguoidung_id."', '".$phieu_vừa_tạo."', 'Dang ky muon do', '".$baygio."', 'SinhVien')";
                mysqli_query($db, $ghi_log);
            }

            header("Location: index.php?tab=lichsu&msg=Thanh_cong");
            exit();
        }else{
            echo "Loi o cau lenh them";
        }
    }
}
?>