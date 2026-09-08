<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phòng học</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'menu.php'; ?>

<div class="noidung">
  <h3>Tìm phòng học</h3>

  <?php
  $tukhoa = isset($_GET['search']) ? trim($_GET['search']) : '';
  ?>

  <form action="Phonglab.php" method="GET">
    <label>Tên / Mã phòng</label>
    <input type="text" name="search"
           value="<?php echo htmlspecialchars($tukhoa); ?>"
           placeholder="Nhập từ khoá...">
    <button type="submit">Tìm kiếm</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>Mã phòng</th>
        <th>Tên phòng</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM phong_lab";
    if ($tukhoa !== '') {
        $safe = mysqli_real_escape_string($ketnoi, $tukhoa);
        $sql  = "SELECT * FROM phong_lab
                 WHERE TenPhong LIKE '%{$safe}%'
                    OR MaPhong  LIKE '%{$safe}%'";
    }
    $rs = mysqli_query($ketnoi, $sql);

    if (mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            $ma  = htmlspecialchars($row['MaPhong']);
            $ten = htmlspecialchars($row['TenPhong']);
            echo "<tr>
                    <td>{$ma}</td>
                    <td>{$ten}</td>
                    <td>
                      <a href='Thietbi.php?phong=" . urlencode($row['MaPhong']) . "'>
                        Xem thiết bị
                      </a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3' style='text-align:center;color:#94a3b8;padding:38px'>
                Không tìm thấy phòng nào
              </td></tr>";
    }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>