<div class="admin-page-content">

    <!-- Bảng lịch sử -->
    <div>
        <div>
            <input type="text" id="tk1" placeholder="Mã phiếu mượn">
            <input type="text" id="tk2" placeholder="Mã người dùng">
            <input type="text" id="tk3" placeholder="Mã thiết bị">
            <input type="text" id="tk4" placeholder="Ngày mượn">
            <input type="text" id="tk5" placeholder="Ngày trả">
            Trạng thái
            <select id="tk6">
                <option value="">Tất cả</option>
                <option value="Chờ duyệt">Chờ duyệt</option>
                <option value="Duyệt mượn">Duyệt mượn</option>
                <option value="Từ chối">Từ chối</option>
                <option value="Đã trả">Đã trả</option>
            </select>
            <button class="button-timkiem">Tìm kiếm</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Mã phiếu mượn</th>
                    <th>Mã người dùng</th>
                    <th>Mã thiết bị</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                    <th>Mã phòng</th>
                </tr>
            </thead>
            <tbody id="table-content">
                <?php
                    $phieu_muon = mysqli_query($conn, "SELECT * FROM phieu_muon");
                    while ($pm = mysqli_fetch_assoc($phieu_muon)) {
                        $ngayMuon = date("d/m/Y H:i", strtotime($pm['NgayMuon']));
                        $ngayTra  = date("d/m/Y H:i", strtotime($pm['NgayTra']));
                        echo "
                            <tr id='{$pm['MaPhieuMuon']}'>
                                <td>{$pm['MaPhieuMuon']}</td>
                                <td>{$pm['MaNguoiDung']}</td>
                                <td>{$pm['MaThietBi']}</td>
                                <td>{$ngayMuon}</td>
                                <td>{$ngayTra}</td>
                                <td>{$pm['TrangThai']}</td>
                                <td>{$pm['MaPhong']}</td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    document.querySelector(".button-timkiem").addEventListener("click", function () {
        const tk1 = document.getElementById("tk1").value.toLowerCase();
        const tk2 = document.getElementById("tk2").value.toLowerCase();
        const tk3 = document.getElementById("tk3").value.toLowerCase();
        const tk4 = document.getElementById("tk4").value.toLowerCase();
        const tk5 = document.getElementById("tk5").value.toLowerCase();
        const tk6 = document.getElementById("tk6").value.toLowerCase();

        document.querySelectorAll("#table-content tr").forEach(function (row) {
            const match =
                row.cells[0].textContent.toLowerCase().includes(tk1) &&
                row.cells[1].textContent.toLowerCase().includes(tk2) &&
                row.cells[2].textContent.toLowerCase().includes(tk3) &&
                row.cells[3].textContent.toLowerCase().includes(tk4) &&
                row.cells[4].textContent.toLowerCase().includes(tk5) &&
                row.cells[5].textContent.toLowerCase().includes(tk6);
            row.style.display = match ? "" : "none";
        });
    });
</script>