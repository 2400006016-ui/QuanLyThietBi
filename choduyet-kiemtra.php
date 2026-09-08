<?php
    include "../db.php";

    $maphieumuon = $_POST['maphieumuon'];
    $manguoidung = $_POST['manguoidung'];
    $mathietbi = $_POST['mathietbi'];
    $tenthietbi = $_POST['tenthietbi'];
    $maphong = $_POST['maphong'];
    $soluong = $_POST['soluong'];

    $duyetmuon = $_POST['duyetmuon'];

    if($duyetmuon == 1){
        //Thêm sau khi duyệt mượn
        mysqli_query($conn,"
            INSERT INTO thiet_bi_muon
                (MaPhieuMuon, MaNguoiDung, MaThietBi, MaPhong, TenThietBi, SoLuong)
            VALUES
                ('$maphieumuon', '$manguoidung', '$mathietbi', '$maphong', '$tenthietbi', '$soluong')
        ");

    }else{
        //Xóa sau khi trả
        mysqli_query($conn,"
            DELETE FROM thiet_bi_muon
            WHERE MaPhieuMuon = '{$maphieumuon}'
        ");
    }
?>