<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lịch sử mượn</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="sv.css">
</head>
<body class="page-svlist">
    <?php include 'menu.php'; ?>

    <main class="admin-content">
        <h1 class="page-title">Lịch sử mượn trả</h1>
    <?php
    if (isset($_GET['msg'])) {
        echo "<div class='success'>" . $_GET['msg'] . "</div>";
    }
    ?>

    <div class="panel"><div class="panel-body"><div class="table-responsive"><table class="data-table">
        <tr>
            <th>Mã phiếu</th>
            <th>Thiết bị</th>
            <th>Phòng</th>
            <th>Ngày mượn</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT p.MaPhieuMuon, t.TenThietBi, p.MaPhong as PhongPhieu, t.MaPhong as PhongTB, p.NgayMuon, p.TrangThai 
                FROM phieu_muon p 
                JOIN thiet_bi t ON p.MaThietBi = t.MaThietBi 
                WHERE p.MaNguoiDung = '$user_id' 
                ORDER BY p.MaPhieuMuon DESC";

        $rs = mysqli_query($ketnoi, $sql);

        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_assoc($rs)) {
                $phong_sd = "Chưa rõ";
                if ($row['PhongPhieu'] != "") {
                    $phong_sd = $row['PhongPhieu'];
                } else if ($row['PhongTB'] != "") {
                    $phong_sd = $row['PhongTB'];
                }

                $tt = $row['TrangThai'];
                $thao_tac = "";
                if ($tt === "Đang mượn" || $tt === "dang_muon") {
                    $thao_tac = "<a class='btn-admin btn-outline-admin' href='traphieu.php?id=" . $row['MaPhieuMuon'] . "'>Trả</a>";
                } else {
                    $thao_tac = "<span style='color:var(--muted);font-size:12px'>—</span>";
                }
                echo "<tr>";
                echo "<td>" . $row['MaPhieuMuon'] . "</td>";
                echo "<td>" . $row['TenThietBi'] . "</td>";
                echo "<td>" . $phong_sd . "</td>";
                echo "<td>" . $row['NgayMuon'] . "</td>";
                echo "<td>" . $tt . "</td>";
                echo "<td class='action-cell'>" . $thao_tac . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='empty-state'>Chưa có lịch sử mượn trả nào</td></tr>";
        }
        ?>
    </table></div></div></div>
</main>
</body>
</html>