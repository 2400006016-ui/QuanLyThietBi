<?php
include 'ketnoi_db.php';

$thongbao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if ($user != "" && $pass != "") {
        $sql = "SELECT * FROM nguoi_dung WHERE TenDangNhap = '".$user."'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            //Kiểm tra password đã HASH
            $passdb = $row['MatKhau'];
            if(!password_verify($pass, $passdb)){
                $thongbao = "Sai tai khoan hoac mat khau!";
                return;
            }

            $_SESSION['user_id'] = $row['MaNguoiDung'];
            $_SESSION['username'] = $row['TenDangNhap'];
            $_SESSION['fullname'] = $row['HoTen'];
            $_SESSION['role'] = ($row['Quyen']);

            $quyen = trim($row['Quyen']);
            if (
                $quyen == 'Admin'
                || $quyen == 'QuanLy'
            ) {
                header("Location: ../admin.php");

            } else if ($quyen == 'GiangVien') {
                header("Location: ../GV-pages/GV.php?id=" . $row['MaNguoiDung']);
                
            } else {
                header("Location: ../SV-pages/index.php");
            }
            exit();
        } else {
            $thongbao = "Sai tai khoan hoac mat khau!";
        }
    } else {
        $thongbao = "Vui long nhap du thong tin!";
    }
}
?>