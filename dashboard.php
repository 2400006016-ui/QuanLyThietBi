<?php
if (!isset($conn)) include '../db.php';

$hoTen = $_SESSION['fullname'] ?? $_SESSION['username'] ?? 'Admin';

// === THỐNG KÊ ===
$tongThietBi = $tongNguoiDung = $tongPhongLab = $choDuyet = $dangMuon = 0;

$r = @mysqli_query($conn, "SELECT COUNT(*) as t FROM thiet_bi");
if ($r) $tongThietBi = mysqli_fetch_assoc($r)['t'];

$r = @mysqli_query($conn, "SELECT COUNT(*) as t FROM nguoi_dung");
if ($r) $tongNguoiDung = mysqli_fetch_assoc($r)['t'];

$r = @mysqli_query($conn, "SELECT COUNT(*) as t FROM phong_lab");
if ($r) $tongPhongLab = mysqli_fetch_assoc($r)['t'];

$r = @mysqli_query($conn, "SELECT COUNT(*) as t FROM phieu_muon WHERE TrangThai = 'Chờ duyệt'");
if ($r) $choDuyet = mysqli_fetch_assoc($r)['t'];

$r = @mysqli_query($conn, "SELECT COUNT(*) as t FROM phieu_muon WHERE TrangThai = 'Duyệt mượn'");
if ($r) $dangMuon = mysqli_fetch_assoc($r)['t'];

// === PHIẾU CHỜ DUYỆT GẦN ĐÂY ===
$dsPhieu = [];
$rPhieu = @mysqli_query($conn, "
    SELECT pm.MaPhieuMuon, tb.TenThietBi, pm.NgayMuon, nd.HoTen
    FROM phieu_muon pm
    LEFT JOIN nguoi_dung nd ON pm.MaNguoiDung = nd.MaNguoiDung
    LEFT JOIN thiet_bi tb ON pm.MaThietBi = tb.MaThietBi
    WHERE pm.TrangThai = 'Chờ duyệt'
    ORDER BY pm.NgayMuon DESC
    LIMIT 6
");
if ($rPhieu) while ($row = mysqli_fetch_assoc($rPhieu)) $dsPhieu[] = $row;

// === THIẾT BỊ ===
$dsThietBi = [];
$rTB = @mysqli_query($conn, "SELECT MaThietBi, TenThietBi, MaPhong, SoLuong, TinhTrang FROM thiet_bi LIMIT 5");
if ($rTB) while ($row = mysqli_fetch_assoc($rTB)) $dsThietBi[] = $row;
?>

<div class="container-fluid py-3 px-4">

    <!-- Tiêu đề trang -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="fw-bold mb-0">Dashboard</h5>
        <small class="text-muted">
            Xin chào, <strong><?= htmlspecialchars($hoTen) ?></strong>
            &nbsp;|&nbsp; <?= date('d/m/Y, H:i') ?>
        </small>
    </div>

    <!-- Stat Cards -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card card-blue border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="fs-3 mb-2">💻</div>
                    <div class="text-muted small fw-semibold text-uppercase mb-1">Thiết Bị</div>
                    <div class="fs-1 fw-bold lh-1 mb-1"><?= $tongThietBi ?></div>
                    <div class="text-muted small">Trong hệ thống</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-green border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="fs-3 mb-2">👥</div>
                    <div class="text-muted small fw-semibold text-uppercase mb-1">Người Dùng</div>
                    <div class="fs-1 fw-bold lh-1 mb-1"><?= $tongNguoiDung ?></div>
                    <div class="text-muted small">Đã đăng ký</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-orange border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="fs-3 mb-2">📋</div>
                    <div class="text-muted small fw-semibold text-uppercase mb-1">Chờ Duyệt</div>
                    <div class="fs-1 fw-bold lh-1 mb-1"><?= $choDuyet ?></div>
                    <div class="text-muted small">Phiếu cần xử lý</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-teal border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="fs-3 mb-2">📦</div>
                    <div class="text-muted small fw-semibold text-uppercase mb-1">Đang Mượn</div>
                    <div class="fs-1 fw-bold lh-1 mb-1"><?= $dangMuon ?></div>
                    <div class="text-muted small">Phiếu đang lưu hành</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="row g-3">

        <!-- Phiếu chờ duyệt -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <span class="fw-semibold">📋 Phiếu Chờ Duyệt</span>
                    <a href="admin.php?tab=choduyet" class="small text-primary text-decoration-none">Xem tất cả →</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover table-sm mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">#</th>
                                <th>Người mượn</th>
                                <th>Thiết bị</th>
                                <th>Ngày mượn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($dsPhieu)): ?>
                                <tr><td colspan="4" class="text-center text-muted py-4 fst-italic">Không có phiếu chờ duyệt</td></tr>
                            <?php else: ?>
                                <?php foreach ($dsPhieu as $p): ?>
                                <tr>
                                    <td class="ps-3"><?= $p['MaPhieuMuon'] ?></td>
                                    <td><?= htmlspecialchars($p['HoTen'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($p['TenThietBi'] ?? '-') ?></td>
                                    <td><?= isset($p['NgayMuon']) ? date('d/m/Y H:i', strtotime($p['NgayMuon'])) : '-' ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Thiết bị -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <span class="fw-semibold">💻 Thiết Bị</span>
                    <a href="admin.php?tab=thietbi" class="small text-primary text-decoration-none">Xem tất cả →</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover table-sm mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Tên thiết bị</th>
                                <th>Phòng</th>
                                <th>SL</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($dsThietBi)): ?>
                                <tr><td colspan="4" class="text-center text-muted py-4 fst-italic">Chưa có thiết bị nào</td></tr>
                            <?php else: ?>
                                <?php foreach ($dsThietBi as $tb): ?>
                                <tr>
                                    <td class="ps-3"><?= htmlspecialchars($tb['TenThietBi']) ?></td>
                                    <td><?= htmlspecialchars($tb['MaPhong']) ?></td>
                                    <td><?= $tb['SoLuong'] ?></td>
                                    <td>
                                        <?php
                                            $tt  = $tb['TinhTrang'] ?? '';
                                            $cls = 'bg-success';
                                            if (mb_stripos($tt, 'hỏng') !== false) $cls = 'bg-danger';
                                            elseif (mb_stripos($tt, 'bảo') !== false || mb_stripos($tt, 'sửa') !== false) $cls = 'bg-warning text-dark';
                                        ?>
                                        <span class="badge <?= $cls ?>"><?= htmlspecialchars($tt) ?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>