<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="sv.css">
</head>
<body class="page-home">
    <?php include 'menu.php'; ?>

    <main class="admin-content">
        <h1 class="page-title">Thống kê tổng quan</h1>

        <?php
        $user_id = $_SESSION['user_id'];

        $kq1 = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) as t FROM phong_lab"));
        $kq2 = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT SUM(SoLuong) as t FROM thiet_bi"));
        $kq3 = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) as t FROM phieu_muon WHERE MaNguoiDung = '$user_id' AND TrangThai LIKE '%Chờ%'"));
        ?>

        <div class="thongke">
            <div class="o">
                <span class="so"><?= (int)$kq1['t'] ?></span>
                <span class="nhan">Tổng số phòng</span>
            </div>
            <div class="o">
                <span class="so"><?= (int)($kq2['t'] ?? 0) ?></span>
                <span class="nhan">Thiết bị hiện có</span>
            </div>
            <div class="o">
                <span class="so"><?= (int)$kq3['t'] ?></span>
                <span class="nhan">Phiếu đang chờ duyệt</span>
            </div>
        </div>
    </main>
</body>
</html>