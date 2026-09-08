<?php
include 'db.php';

if (!isset($_SESSION['username']) ||
    ($_SESSION['role'] != 'Admin' && $_SESSION['role'] != 'QuanLy')) {
    header("Location: Login-pages/login.php");
    exit();
}

$tab      = $_GET['tab'] ?? 'dashboard';
$search   = trim($_GET['search'] ?? '');
$phong_id = $_GET['phong'] ?? '';
$role     = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Quản Lý Thiết Bị</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="admin-pages/admin.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container-fluid px-3">
            <div class="d-flex align-items-center">
                <button class="nav-btn me-3" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                    <i class="bi bi-list"></i>
                </button>
                <span class="navbar-brand mb-0">HỆ THỐNG QUẢN LÝ</span>
            </div>
            <span class="text-white d-none d-md-inline">
                Người dùng: <b><?= $role === 'Admin' ? 'Quản trị viên' : 'Quản lý' ?></b>
            </span>
        </div>
    </nav>

    <!-- Sidebar offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu">
        <div class="offcanvas-header bg-primary text-white">
            <h5 class="offcanvas-title fw-bold">MENU CHỨC NĂNG</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
            <div class="list-group list-group-flush">
                <a href="admin.php?tab=dashboard"    class="list-group-item list-group-item-action py-3"><i class="bi bi-house-door me-2"></i>Trang chủ</a>
                <a href="admin.php?tab=choduyet"     class="list-group-item list-group-item-action py-3"><i class="bi bi-clipboard-check me-2"></i>Chờ duyệt</a>
                <a href="admin.php?tab=lichsuduyet"  class="list-group-item list-group-item-action py-3"><i class="bi bi-clock-history me-2"></i>Lịch sử duyệt</a>
                <a href="admin.php?tab=nguoidung"    class="list-group-item list-group-item-action py-3"><i class="bi bi-people me-2"></i>Người dùng</a>
                <a href="admin.php?tab=thietbi"      class="list-group-item list-group-item-action py-3"><i class="bi bi-laptop me-2"></i>Thiết bị</a>
                <a href="admin.php?tab=phonglab"     class="list-group-item list-group-item-action py-3"><i class="bi bi-door-open me-2"></i>Phòng lab</a>
                <a href="admin.php?tab=tinnhan"     class="list-group-item list-group-item-action py-3"><i class="bi bi-clock-history me-2"></i>Tin nhắn</a>
            </div>
            <div class="p-3 border-top">
                <a href="logout.php" class="btn btn-outline-danger w-100 fw-bold py-2">
                    <i class="bi bi-box-arrow-right me-2"></i>Đăng xuất
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="admin-content">
        <?php
        switch ($tab) {
            case 'choduyet':    include 'admin-pages/choduyet.php';    break;
            case 'lichsuduyet': include 'admin-pages/lichsuduyet.php'; break;
            case 'nguoidung':   include 'admin-pages/nguoidung.php';   break;
            case 'thietbi':     include 'admin-pages/thietbi.php';     break;
            case 'phonglab':    include 'admin-pages/phonglab.php';    break;
            case 'tinnhan':    include 'admin-pages/tinnhan.php';    break;
            default:            include 'admin-pages/dashboard.php';   break;
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>let role = '<?= $role ?>';</script>
</body>
</html>