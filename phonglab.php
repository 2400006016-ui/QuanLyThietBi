<?php include 'ketnoi.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách phòng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="sv.css">
</head>
<body class="page-svlist">
    <?php include 'menu.php'; ?>

    <main class="admin-content">
        <h1 class="page-title">Danh sách phòng</h1>
        <p class="page-subtitle">Tìm kiếm phòng học và xem các thiết bị đang được quản lý.</p>
    <?php
    $kw = "";
    if (isset($_GET['search'])) {
        $kw = $_GET['search'];
    }
    ?>
    <div class="panel"><div class="panel-body"><form method="GET" action="phonglab.php" class="toolbar" style="margin-bottom:0">
        <span style="color:var(--muted);font-size:13px;white-space:nowrap;font-weight:600">Tên / Mã phòng</span>
        <input type="text" name="search" value="<?php echo htmlspecialchars($kw); ?>" placeholder="Nhập từ khoá..." style="flex:1;min-width:200px">
        <button type="submit" class="btn-admin">Tìm kiếm</button>
    </form></div></div>
    <div class="panel mt-3"><div class="panel-body">

    <table class="data-table">
        <tr>
            <th>Mã phòng</th>
            <th>Tên phòng</th>
            <th>Thao tác</th>
        </tr>
        <?php
        $sql = "SELECT * FROM phong_lab";
        if ($kw != "") {
            $sql = "SELECT * FROM phong_lab WHERE TenPhong LIKE '%$kw%' OR MaPhong LIKE '%$kw%'";
        }
        $rs = mysqli_query($ketnoi, $sql);

        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_assoc($rs)) {
                echo "<tr>";
                echo "<td>" . $row['MaPhong'] . "</td>";
                echo "<td>" . $row['TenPhong'] . "</td>";
                echo "<td class='action-cell'><a class='btn-admin btn-outline-admin' href='thietbi.php?phong=" . $row['MaPhong'] . "'><i class='bi bi-eye me-1'></i>Xem thiết bị</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table></div></div>
</main>
</body>
</html>