<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tin nhắn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="sv.css">
</head>
<body class="page-thongbao">
<?php include 'menu.php'; ?>

<main class="admin-content">

<?php
$user_id = $_SESSION['user_id'];

if (isset($_GET['sent'])) {
    echo "<div class='success-box'><i class='bi bi-check-circle me-1'></i>Đã gửi tin nhắn thành công!</div>";
}
?>

<!-- Gửi tin nhắn -->
<div class="panel">
  <div class="panel-body">
    <p class="section-label">Gửi tin nhắn</p>
    <form action="Goitinchatsv.php" method="POST">
      <textarea name="noidung" placeholder="Nhập nội dung tin nhắn..."></textarea>
      <button type="submit" class="btn-gui">Gửi đi</button>
    </form>
  </div>
</div>

<!-- Tin đã gửi -->
<div class="panel">
  <div class="panel-body">
    <p class="section-label">Tin đã gửi</p>
    <ul class="msg-list">
    <?php
    $sql = "SELECT * FROM thong_bao_nhac_nho
            WHERE ma_nguoi_dung = '" . mysqli_real_escape_string($ketnoi, $user_id) . "'
            ORDER BY id DESC";
    $rs = mysqli_query($ketnoi, $sql);

    if ($rs && mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            $da_doc = ($row['da_doc'] == 1);
            $badge  = $da_doc
                ? "<span class='badge-read'>Đã đọc</span>"
                : "<span class='badge-unread'>Chưa đọc</span>";
            echo "<li class='msg-item'>
                    <div class='msg-meta'>
                      <span class='msg-time'><i class='bi bi-clock me-1'></i>"
                        . htmlspecialchars($row['thoi_gian']) . "
                      </span>
                      $badge
                    </div>
                    <div>" . htmlspecialchars($row['noi_dung']) . "</div>
                  </li>";
        }
    } else {
        echo "<li class='empty-state'>Chưa có tin nhắn nào</li>";
    }
    ?>
    </ul>
  </div>
</div>

</main>
</body>
</html>