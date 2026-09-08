<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lịch sử mượn trả</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'menu.php'; ?>

<div class="noidung">
  <h3>Lịch sử mượn trả</h3>

  <table>
    <thead>
      <tr>
        <th>Mã phiếu</th>
        <th>Thiết bị</th>
        <th>Phòng</th>
        <th>Ngày mượn</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT p.MaPhieuMuon, t.TenThietBi, p.MaPhong, p.NgayMuon, p.TrangThai
            FROM phieu_muon p
            LEFT JOIN thiet_bi t ON p.MaThietBi = t.MaThietBi
            WHERE p.MaNguoiDung = '" . mysqli_real_escape_string($ketnoi, $id_gv) . "'
            ORDER BY p.MaPhieuMuon DESC";

    $rs = mysqli_query($ketnoi, $sql);

    if (mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            $tt = $row['TrangThai'];

            // Xác định màu tag trạng thái
            if (strpos($tt, 'Đã trả') !== false || strpos($tt, 'Hoàn') !== false) {
                $cls = 'tag-ok';
            } elseif (strpos($tt, 'Từ chối') !== false) {
                $cls = 'tag-loi';
            } elseif (strpos($tt, 'Duyệt') !== false) {
                $cls = 'tag-info';
            } else {
                $cls = 'tag-cho';
            }

            $da_tra = (strpos($tt, 'Đã trả') !== false);

            echo "<tr>
                    <td>" . htmlspecialchars($row['MaPhieuMuon']) . "</td>
                    <td>" . htmlspecialchars($row['TenThietBi'])  . "</td>
                    <td>" . htmlspecialchars($row['MaPhong'])     . "</td>
                    <td>" . htmlspecialchars($row['NgayMuon'])    . "</td>
                    <td><span class='tag {$cls}'>" . htmlspecialchars($tt) . "</span></td>
                    <td>";

            if (!$da_tra) {
                echo "<a href='Trathietbi.php?maphieu=" . urlencode($row['MaPhieuMuon']) . "'>Trả đồ</a>";
            } else {
                echo "<span class='mo-ta-trang'>Hoàn thành</span>";
            }

            echo "  </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center;color:#94a3b8;padding:38px'>
                Chưa có lịch sử mượn trả nào
              </td></tr>";
    }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>