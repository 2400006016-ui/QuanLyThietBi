<?php
// menu dùng chung cho khu vực Sinh Viên
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$menuName = $_SESSION['HoTen'] ?? $_SESSION['hoten'] ?? $_SESSION['name'] ?? '';
if ($menuName === '' && isset($_SESSION['user_id']) && isset($ketnoi)) {
    $uid = mysqli_real_escape_string($ketnoi, (string)$_SESSION['user_id']);
    $q = mysqli_query($ketnoi, "SELECT HoTen FROM nguoi_dung WHERE MaNguoiDung = '$uid' LIMIT 1");
    if ($q && ($u = mysqli_fetch_assoc($q))) {
        $menuName = $u['HoTen'];
    }
}
if ($menuName === '') {
    $menuName = $_SESSION['username'] ?? 'Người dùng';
}

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<link rel="stylesheet" href="css/style.css">

<header class="site-header">
    <div class="site-topbar">
        <a class="site-brand" href="index.php">Quản Lý Mượn Trả Thiết Bị</a>
        <div class="site-account">
            <span>Xin chào, <strong><?php echo htmlspecialchars($menuName, ENT_QUOTES, 'UTF-8'); ?></strong></span>
            <a class="site-logout" href="../logout.php">Đăng xuất</a>
        </div>
    </div>

    <nav class="site-nav" aria-label="Điều hướng chính">
        <a class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>" href="index.php">Trang chủ</a>
        <a class="<?php echo $currentPage === 'phonglab.php' || $currentPage === 'phonglab(1).php' ? 'active' : ''; ?>" href="phonglab.php">Phòng học</a>
        <a class="<?php echo $currentPage === 'thietbi.php' || $currentPage === 'thietbi(1).php' ? 'active' : ''; ?>" href="thietbi.php">Thiết bị</a>
        <a class="<?php echo $currentPage === 'lichsu.php' ? 'active' : ''; ?>" href="lichsu.php">Lịch sử</a>
        <a class="<?php echo $currentPage === 'thongbao.php' ? 'active' : ''; ?>" href="thongbao.php">Tin nhắn</a>
    </nav>
</header>