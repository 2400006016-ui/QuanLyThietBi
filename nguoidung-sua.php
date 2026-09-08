<?php
    include "../db.php";

    $chon = $_POST['chon'];
    $id = $_POST['id'];

    $manguoidung = $_POST['manguoidung'];
    $username = $_POST['username'];
    $matkhau = $_POST['matkhau'];

    //Hash mật khẩu trước khi lưu
    if($matkhau != ""
        && $matkhau != null){
        $matkhau = password_hash(
            $matkhau
            , PASSWORD_DEFAULT
        );
    }

    $ten = $_POST['ten'];
    $mssv = $_POST['mssv'];
    $quyen = $_POST['quyen'];
    $email = $_POST['email'];

    //Hàm dành cho khi xử lý SQL, và gửi về kết quả
    function responseSuccess($manguoidung, $username, $matkhau, $ten, $mssv, $email, $quyen){
        echo json_encode([
            "result"=>"success",
            "manguoidung"=>$manguoidung,
            "username"=>$username,
            "matkhau"=>$matkhau,
            "ten"=>$ten,
            "mssv"=>$mssv,
            "email"=>$email,
            "quyen"=>$quyen,
            
        ]);
    }

    function responseError(){
        echo json_encode([
            "result"=>"error"
        ]);
    }

    switch($chon){
        //Sửa
        case 0:
            $sql = "
                UPDATE nguoi_dung
                SET TenDangNhap = '$username',
                    HoTen = '$ten',
                    mssv = '$mssv',
                    Quyen = '$quyen',
                    Email = '$email'
                WHERE TenDangNhap = '$id'
            ";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                responseError();
                return;
            }

            //Update mật khẩu nếu có thay đổi
            //Check null dù fetch mặc định gửi "" nếu ko dùng pass, tránh người dùng execute commands lạ và gửi null
            if($matkhau != "" && $matkhau != null){
                $sql = "
                    UPDATE nguoi_dung
                    SET MatKhau = '$matkhau'
                    WHERE TenDangNhap = '$id'
                ";
                $result = mysqli_query($conn, $sql);
            }
            if(!$result){
                responseError();
                return;
            }
            if($result) responseSuccess($manguoidung, $username, $matkhau, $ten, $mssv, $email, $quyen);

            break;

        //Xóa
        case 1:
            $sql = "
                DELETE FROM nguoi_dung
                WHERE TenDangNhap = '$id'
            ";
            $result = mysqli_query($conn, $sql);

            if(!$result){
                responseError();
                return;
            }
            break;

        //Thêm
        default :
            $sql = "
                INSERT INTO nguoi_dung
                    (TenDangNhap, MatKhau, HoTen, mssv, Quyen, Email)
                VALUES
                        ('$username', '$matkhau', '$ten', '$mssv', '$quyen', '$email')
            ";
            $result = mysqli_query($conn, $sql);

            if(!$result){
                responseError();
                return;
            }
            //Lấy cái mà SQL tự động tạo bằng AUTO_INCREMENT, tức mã người dùng, mã người dùng ko còn cho phép vừa tạo thủ công, vừa tự động nữa
            $manguoidung = mysqli_insert_id($conn);
            if($result) responseSuccess($manguoidung, $username, $matkhau, $ten, $mssv, $email, $quyen);
    }
?>