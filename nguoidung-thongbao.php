<?php
    include "../db.php";

    $manguoidung = $_POST['manguoidung'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $thoi_gian = date("Y-m-d H:i:s");
    $nguoi_gui = "QuanLy-quanlymuontrathietbi";

    //Chèn dữ liệu vào
            $sql = "
                INSERT INTO thong_bao_nhac_nho
                    (ma_nguoi_dung, tieu_de	, noi_dung, thoi_gian, da_doc)
                VALUES
                        ('$manguoidung', '$tieude', '$noidung', '$thoi_gian', 0)
            ";
            mysqli_query($conn, $sql);
    
    //Gửi qua email
            //Tìm email của người dùng
            $sql = "
                SELECT *
                FROM nguoi_dung

                WHERE MaNguoiDung = '$manguoidung'
            ";
            $result = mysqli_query($conn, $sql);

            //mysqli_query() trả về chuỗi giá trị
            //mysqli_fetch_assoc() không nằm trong while -> lấy dòng đầu tiên.
            $row = mysqli_fetch_assoc($result);

            //Kiểm tra search có ra tên người dùng & email của người dùng
            if($row && $row['Email']){
                mail(
                    $row['Email'],
                    $tieude,
                    $noidung,
                    "From: {$nguoi_gui}@localhost"
                );
            }
    //Tránh trường hợp dùng link load trang 
    header("Location: ../admin.php");
?>