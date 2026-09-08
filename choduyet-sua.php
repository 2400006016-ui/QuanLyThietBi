<?php
    include "../db.php";

    $chon = $_POST['chon'];
    $maphieumuon = $_POST['maphieumuon'];

    //Bảng phieu_muon
    if($chon == 0){
    //ĐỒNG Ý
        //Đồng ý => Sửa
        $thoi_gian = date("Y-m-d H:i:s");
        $sql = "
        UPDATE phieu_muon

            SET TrangThai = 'Duyệt mượn',
                NgayMuon = '$thoi_gian'
            WHERE MaPhieuMuon = '$maphieumuon'
            AND TrangThai = 'Chờ duyệt';
        ";
        mysqli_query($conn, $sql);

        //Gửi qua thông báo


    }else{
        //Từ chối hoặc xác nhận trả
        $thoi_gian = date("Y-m-d H:i:s");
        $sql = "
        UPDATE phieu_muon

            SET TrangThai = 'Từ chối'
                
            WHERE MaPhieuMuon = '$maphieumuon'
            AND TrangThai = 'Chờ duyệt';

            
            
            UPDATE phieu_muon

            SET TrangThai = 'Đã trả',
                NgayTra = '$thoi_gian'
            WHERE MaPhieuMuon = '$maphieumuon'
            AND TrangThai = 'Duyệt mượn';
        ";
        mysqli_multi_query($conn, $sql);
    }
    //Tránh trường hợp dùng link load trang 
    header("Location: ../admin.php");
?>