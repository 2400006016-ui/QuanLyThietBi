<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tin nhắn</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'menu.php'; ?>

<div class="noidung">

  <!-- Form gửi tin -->
  <div class="form-gui-tin">
    <h3>Gửi tin nhắn</h3>
    <form action="Goitinchat.php" method="POST"
          style="display:block;background:none;box-shadow:none;padding:0;margin:0">
      <textarea name="noidung" placeholder="Nhập nội dung tin nhắn..."></textarea>
      <button type="submit">Gửi đi</button>
    </form>
  </div>

  <!-- Danh sách tin đã gửi -->
  <p class="section-title">Tin đã gửi</p>

  <ul class="danh-sach-tin">
  <?php
  $sql = "SELECT * FROM thong_bao_nhac_nho
          WHERE ma_nguoi_dung = '" . mysqli_real_escape_string($ketnoi, $id_gv) . "'
          ORDER BY id DESC";
  $rs = mysqli_query($ketnoi, $sql);

  if (mysqli_num_rows($rs) > 0) {
      while ($row = mysqli_fetch_assoc($rs)) {
          $da_doc = ($row['da_doc'] == 1);
          $cls    = $da_doc ? 'da-doc' : 'chua-doc';
          $label  = $da_doc ? 'Đã đọc'  : 'Chưa đọc';
          echo "<li>
                  <div class='tin-meta'>
                    <span class='tin-ngay'>" . htmlspecialchars($row['thoi_gian']) . "</span>
                    <span class='tin-badge {$cls}'>{$label}</span>
                  </div>
                  <div>" . htmlspecialchars($row['noi_dung']) . "</div>
                </li>";
      }
  } else {
      echo "<li style='text-align:center;color:#94a3b8;padding:38px'>
              Chưa có tin nhắn nào
            </li>";
  }
  ?>
  </ul>

</div>
</body>
</html>