<?php
// Xác định trang hiện tại để highlight menu
$_trang = basename($_SERVER['PHP_SELF']);
function _active($ten) {
    global $_trang;
    return ($ten === $_trang) ? ' class="active"' : '';
}
?>
<header class="dautrang">
  <div class="dautrang-trong">
    <h2>Quản Lý Mượn Trả Thiết Bị</h2>
    <div class="thongtin-nguoidung">
      <span>Xin chào, <strong style="color:#fff"><?php echo htmlspecialchars($hoten); ?></strong></span>
      <a href="../logout.php">Đăng xuất</a>
    </div>
  </div>
  <nav class="menu-chinh">
    <a href="GV.php"<?php echo _active('GV.php'); ?>>Trang chủ</a>
    <a href="Phonglab.php"<?php echo _active('Phonglab.php'); ?>>Phòng học</a>
    <a href="Thietbi.php"<?php echo _active('Thietbi.php'); ?>>Thiết bị</a>
    <a href="Lichsu.php"<?php echo _active('Lichsu.php'); ?>>Lịch sử</a>
    <a href="Thongbao.php"<?php echo _active('Thongbao.php'); ?>>Tin nhắn</a>
  </nav>
</header>