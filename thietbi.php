<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách thiết bị</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="sv.css">
</head>
<body class="page-thietbi">
    <?php include 'menu.php'; ?>

    <main class="admin-content">
        <h1 class="page-title">Danh sách thiết bị</h1>
        <p class="page-subtitle">Danh sách thiết bị có thể mượn trong hệ thống.</p>

        <!-- Thông báo lỗi (hiện bằng JS khi cần) -->
        <div class="error-box" id="soluong-error"></div>

        <?php
        // Lấy phòng được chọn (nếu có) từ query string
        $phong = "";
        if (isset($_GET['phong'])) {
            $phong = $_GET['phong'];
            echo "
                <div class='room-info'>
                    <i class='bi bi-door-open'></i>
                    <span>Phòng đang chọn: <strong>" . htmlspecialchars($phong, ENT_QUOTES, 'UTF-8') . "</strong></span>
                </div>
            ";
        } else {
            echo "
                <div class='no-room-notice'>
                    ⚠ Bạn chưa chọn phòng. Hãy chọn phòng trước để mượn thiết bị.
                    &nbsp;<a href='phonglab.php'>Chọn phòng →</a>
                </div>
            ";
        }
        ?>

        <div class="panel">
            <div class="panel-header">
                <i class="bi bi-laptop me-2"></i>Danh sách thiết bị
            </div>

            <div class="panel-body">
                <div class="table-wrap">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Mã thiết bị</th>
                                <th>Tên thiết bị</th>
                                <th>Số lượng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="table-content">
                            <?php
                            /*
                             * Lấy tất cả thiết bị.
                             * Lưu ý: CSDL hiện tại không có bảng thiet_bi_muon
                             * hay cột SoLuong trong phieu_muon, nên số lượng
                             * còn lại lấy trực tiếp từ thiet_bi.SoLuong.
                             */
                            $sql = "SELECT * FROM thiet_bi ORDER BY MaThietBi ASC";
                            $rs  = mysqli_query($ketnoi, $sql);

                            if (!$rs) {
                                echo "<tr><td colspan='4' class='empty-state'>Không thể tải danh sách thiết bị.</td></tr>";
                            } elseif (mysqli_num_rows($rs) > 0) {
                                while ($tb = mysqli_fetch_assoc($rs)) {

                                    $sum = 0;
                                    $result = mysqli_query($ketnoi, "SELECT * FROM thiet_bi_muon WHERE MaThietBi = '{$tb['MaThietBi']}' ");
                                    while($eachResult = mysqli_fetch_assoc($result)) $sum += (int)$eachResult['SoLuong'];

                                    $remains  = (int)$tb['SoLuong'] - $sum;
                                    $maTB     = htmlspecialchars($tb['MaThietBi'], ENT_QUOTES, 'UTF-8');
                                    $tenTB    = htmlspecialchars($tb['TenThietBi'], ENT_QUOTES, 'UTF-8');
                                    $soLuongClass = $remains > 0 ? 'so-luong-con' : 'so-luong-het';

                                    echo "<tr data-soluong='$remains'>";
                                    echo "<td>$maTB</td>";
                                    echo "<td>$tenTB</td>";
                                    echo "<td class='$soLuongClass'>$remains</td>";

                                    echo "<td>";
                                    if ($remains > 0) {
                                        if ($phong != "") {
                                            $phongVal = htmlspecialchars($phong, ENT_QUOTES, 'UTF-8');
                                            echo "
                                                <form action='muonthietbi.php' method='POST' class='submit-request borrow-form'>
                                                    <input type='hidden' name='MaThietBi' value='$maTB'>
                                                    <input type='hidden' name='TenThietBi' value='$tenTB'>
                                                    <input type='hidden' name='MaPhong' value='$phongVal'>
                                                    <button class='btn-admin' type='submit'>
                                                        <i class='bi bi-box-arrow-up-right'></i> Mượn
                                                    </button>
                                                </form>
                                            ";
                                        } else {
                                            echo "<span class='hint-muted'>Chưa chọn phòng</span>";
                                        }
                                    } else {
                                        echo "<span class='status-empty'>Hết</span>";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='empty-state'>Không có thiết bị.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        // TODO: script xử lý lỗi số lượng (#soluong-error) khi mượn thiết bị
        // bị thiếu trong bản gốc — bổ sung lại nếu bạn còn giữ code cũ.
    </script>
</body>
</html>