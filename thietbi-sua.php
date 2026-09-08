<?php
    include "../db.php";

    $chon = $_POST['chon'];
    $id = $_POST['id'];

    $mathietbi = $_POST['mathietbi'];
    $tenthietbi = $_POST['tenthietbi'];
    $maphong = $_POST['maphong'];
    $soluong = $_POST['soluong'];
    $tinhtrang = $_POST['tinhtrang'];

    switch($chon){
        //Sửa
        case 0:
            $sql = "
                UPDATE thiet_bi
                SET MaThietBi = '$mathietbi',
                    TenThietBi = '$tenthietbi',
                    MaPhong = '$maphong',
                    SoLuong = '$soluong',
                    TinhTrang = '$tinhtrang'
                WHERE MaThietBi = '$id'
            ";
            mysqli_query($conn, $sql);
            break;

        //Xóa
        case 1:
            $sql = "
                DELETE FROM thiet_bi
                WHERE MaThietBi = '$id'
            ";
            mysqli_query($conn, $sql);
            break;

        //Thêm
        default :
            $sql = "
                INSERT INTO thiet_bi
                    (MaThietBi, TenThietBi, MaPhong, SoLuong, TinhTrang)
                VALUES
                        ('$mathietbi', '$tenthietbi', '$maphong', '$soluong', '$tinhtrang')
            ";
            mysqli_query($conn, $sql);

    }
    
    //Tránh trường hợp dùng link load trang 
    header("Location: ../admin.php");
?>