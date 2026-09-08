<?php
    include "../db.php";
    $id = $_POST['id'];
    $chon = $_POST['chon'];

    $maphong = $_POST['maphong'];
    $tenphong = $_POST['tenphong'];

    switch($chon){
        //Sửa
        case 0:
            $sql = "
                UPDATE phong_lab
                SET MaPhong = '$maphong',
                    TenPhong = '$tenphong'
                WHERE MaPhong = '$id'
            ";
            mysqli_query($conn, $sql);
            break;

        //Xóa
        case 1:
            $sql = "
                DELETE FROM phong_lab
                WHERE MaPhong = '$id'
            ";
            mysqli_query($conn, $sql);
            break;

        //Thêm
        default :
            $sql = "
                INSERT INTO phong_lab
                    (MaPhong, TenPhong)
                VALUES
                        ('$maphong', '$tenphong')
            ";
            mysqli_query($conn, $sql);

    }
    
    //Tránh trường hợp dùng link load trang 
    header("Location: ../admin.php");
?>