<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ — Giảng Viên</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'menu.php'; ?>

<div class="noidung">
  <h3>Tổng quan</h3>

  <?php
  $q1 = mysqli_query($ketnoi, "SELECT COUNT(*) AS t FROM phong_lab");
  $kq1 = mysqli_fetch_assoc($q1);

  $q2 = mysqli_query($ketnoi, "SELECT SUM(SoLuong) AS t FROM thiet_bi");
  $kq2 = mysqli_fetch_assoc($q2);

  $q3 = mysqli_query($ketnoi, "SELECT COUNT(*) AS t FROM phieu_muon WHERE TrangThai LIKE '%Chờ%'");
  $kq3 = mysqli_fetch_assoc($q3);

  $q4 = mysqli_query($ketnoi, "SELECT COUNT(*) AS t FROM phieu_muon WHERE MaNguoiDung = '".$id_gv."' AND TrangThai LIKE '%Duyệt%'");
  $kq4 = mysqli_fetch_assoc($q4);
  ?>

  <div class="thongke">
    <div class="o">
      <span class="so"><?php echo (int)$kq1['t']; ?></span>
      <span class="nhan">Tổng số phòng</span>
    </div>
    <div class="o">
      <span class="so"><?php echo (int)($kq2['t'] ?? 0); ?></span>
      <span class="nhan">Thiết bị hiện có</span>
    </div>
    <div class="o">
      <span class="so"><?php echo (int)$kq3['t']; ?></span>
      <span class="nhan">Phiếu đang chờ duyệt</span>
    </div>
    <div class="o">
      <span class="so"><?php echo (int)($kq4['t'] ?? 0); ?></span>
      <span class="nhan">Phiếu của bạn đang mượn</span>
    </div>
  </div>
</div>

</body>
</html>