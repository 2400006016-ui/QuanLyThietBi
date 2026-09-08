<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thiết bị</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'menu.php'; ?>

<div class="noidung">
  <h3>Danh sách thiết bị</h3>

  <?php
  $p = isset($_GET['phong']) ? trim($_GET['phong']) : '';
  if ($p !== '') {
      echo "<p style='margin-bottom:14px;font-size:13.5px;color:#64748b'>
              Phòng đang chọn: <strong style='color:#1a3c6e'>" . htmlspecialchars($p) . "</strong>
              &nbsp;— <a href='Phonglab.php' style='color:#64748b;font-size:12.5px'>Đổi phòng</a>
            </p>";
  } else {
      echo "<div style='background:#fffbeb;border:1px solid #fcd34d;border-radius:6px;
                        padding:10px 16px;margin-bottom:14px;font-size:13px;color:#92400e'>
              ⚠ Bạn chưa chọn phòng. Hãy chọn phòng trước để mượn thiết bị.
              &nbsp;<a href='Phonglab.php' style='color:#92400e;font-weight:600'>Chọn phòng →</a>
            </div>";
  }
  ?>

  <table>
    <thead>
      <tr>
        <th>Mã thiết bị</th>
        <th>Tên thiết bị</th>
        <th>Số lượng</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $rs = mysqli_query($ketnoi, "SELECT * FROM thiet_bi ORDER BY MaThietBi ASC");
    if (mysqli_num_rows($rs) > 0) {
        while ($r = mysqli_fetch_assoc($rs)) {
            $sum = 0;
            $result = mysqli_query($ketnoi, "SELECT * FROM thiet_bi_muon WHERE MaThietBi = '{$r['MaThietBi']}' ");
            while($eachResult = mysqli_fetch_assoc($result)) $sum += (int)$eachResult['SoLuong'];

            $remains  = (int)$r['SoLuong'] - $sum;

            echo "<tr>";
            echo "<td>" . htmlspecialchars($r['MaThietBi'])  . "</td>";
            echo "<td>" . htmlspecialchars($r['TenThietBi']) . "</td>";
            echo "<td>" . $remains . "</td>";
            echo "<td>";
            if ($p !== '') {
            
                if ($remains > 0) {
                    echo "<a href='Muonnhanh.php?matb=" . urlencode($r['MaThietBi'])
                       . "&phong=" . urlencode($p) . "'>Mượn ngay</a>";
                } else {
                    echo "<span class='tag tag-loi'>Hết hàng</span>";
                }
            } else {
                echo "<span class='tag tag-gray'>Chưa chọn phòng</span>";
            }
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>