<div class="admin-page-content">

    <!-- Bảng dữ liệu -->
    <div>
        <div>
            <input type="text" id="tk1" placeholder="Mã phiếu mượn">
            <input type="text" id="tk2" placeholder="Mã người dùng">
            <input type="text" id="tk3" placeholder="Mã thiết bị">
            <input type="text" id="tk4" placeholder="Tên thiết bị">
            <input type="text" id="tk5" placeholder="Mã phòng">
            <input type="text" id="tk6" placeholder="Số lượng">
            <input type="text" id="tk7" placeholder="Ngày mượn">
            <button class="button-timkiem">Tìm kiếm</button>
            <button class="button-doimuc">Đổi mục</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Mã phiếu mượn</th>
                    <th>Mã người dùng</th>
                    <th>Mã thiết bị</th>
                    <th>Tên thiết bị</th>
                    <th>Mã Phòng</th>
                    <th>Số lượng</th>
                    <th>Ngày mượn</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="table-content">
                <!-- Dữ liệu được tải qua loadData() -->
            </tbody>
        </table>
    </div>

</div>

<script>
    // Nút tìm kiếm
    document.querySelector(".button-timkiem").addEventListener("click", function () {
        const tk1 = document.getElementById("tk1").value.toLowerCase();
        const tk2 = document.getElementById("tk2").value.toLowerCase();
        const tk3 = document.getElementById("tk3").value.toLowerCase();
        const tk4 = document.getElementById("tk4").value.toLowerCase();
        const tk5 = document.getElementById("tk5").value.toLowerCase();
        const tk6 = document.getElementById("tk6").value.toLowerCase();
        const tk7 = document.getElementById("tk7").value.toLowerCase();

        document.querySelectorAll("#table-content tr").forEach(function (row) {
            const match =
                row.cells[0].textContent.toLowerCase().includes(tk1) &&
                row.cells[1].textContent.toLowerCase().includes(tk2) &&
                row.cells[2].textContent.toLowerCase().includes(tk3) &&
                row.cells[3].textContent.toLowerCase().includes(tk4) &&
                row.cells[4].textContent.toLowerCase().includes(tk5) &&
                row.cells[5].textContent.toLowerCase().includes(tk6) &&
                row.cells[6].textContent.toLowerCase().includes(tk7);
            row.style.display = match ? "" : "none";
        });
    });

    // Tải dữ liệu từ PHP
    function loadData(load) {
        autoDecline();

        fetch("admin-pages/choduyet-loaddata.php", {
            method: "POST",
            body: new URLSearchParams({ load: load })
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("table-content").innerHTML = data;
            hookButton();
        });
    }

    let load = 0;
    loadData(load);

    // Nút đổi mục
    document.querySelector(".button-doimuc").addEventListener("click", function () {
        load = load === 0 ? 1 : 0;
        loadData(load);
    });

    // Gửi thông báo qua inbox & email
    function sendNotification(maphieumuon, manguoidung, mathietbi, tenthietbi, maphong, soluong, ngaymuon, result) {
        const labels = { 0: "được duyệt mượn", 1: "bị từ chối", default: "được duyệt trả" };
        const ketqua = labels[result] ?? labels.default;

        const noidung = `Phiếu mượn thiết bị ${maphieumuon}\nThiết bị ${tenthietbi} - (${mathietbi}), số lượng ${soluong}, phòng ${maphong} vào lúc ${ngaymuon}.\nPhiếu đã ${ketqua}.`;

        fetch("admin-pages/nguoidung-thongbao.php", {
            method: "POST",
            body: new URLSearchParams({
                manguoidung, tieude: "Phiếu mượn thiết bị", noidung
            })
        });
    }

    // Hàm đồng ý
    function acceptRequest(btn) {
        const row = FindFirstAncestorOfClass(btn, "TR");
        const maphieumuon = btn.dataset.maphieumuon;

        fetch("admin-pages/choduyet-sua.php", {
            method: "POST",
            body: new URLSearchParams({ maphieumuon, chon: 0 })
        }).then(() => {
            document.getElementById(maphieumuon).remove();
            sendNotification(row.dataset.maphieumuon, row.dataset.manguoidung, row.dataset.mathietbi, row.dataset.tenthietbi, row.dataset.maphong, row.dataset.soluong, row.dataset.ngaymuon, 0);
        });

        fetch("admin-pages/choduyet-kiemtra.php", {
            method: "POST",
            body: new URLSearchParams({
                maphieumuon: row.dataset.maphieumuon,
                manguoidung: row.dataset.manguoidung,
                mathietbi:   row.dataset.mathietbi,
                tenthietbi:  row.dataset.tenthietbi,
                maphong:     row.dataset.maphong,
                soluong:     row.dataset.soluong,
                duyetmuon:   1
            })
        });

        autoDecline();
    }

    // Hàm từ chối
    function declineRequest(btn) {
        const row = FindFirstAncestorOfClass(btn, "TR");
        const maphieumuon = btn.dataset.maphieumuon;

        fetch("admin-pages/choduyet-sua.php", {
            method: "POST",
            body: new URLSearchParams({ maphieumuon, chon: 1 })
        }).then(() => {
            document.getElementById(maphieumuon).remove();
            sendNotification(row.dataset.maphieumuon, row.dataset.manguoidung, row.dataset.mathietbi, row.dataset.tenthietbi, row.dataset.maphong, row.dataset.soluong, row.dataset.ngaymuon, 1);
        });
    }

    // Hàm duyệt trả
    function verifyRequest(btn) {
        const row = FindFirstAncestorOfClass(btn, "TR");
        const maphieumuon = btn.dataset.maphieumuon;

        fetch("admin-pages/choduyet-sua.php", {
            method: "POST",
            body: new URLSearchParams({ maphieumuon, chon: 1 })
        }).then(() => {
            document.getElementById(maphieumuon).remove();
            sendNotification(row.dataset.maphieumuon, row.dataset.manguoidung, row.dataset.mathietbi, row.dataset.tenthietbi, row.dataset.maphong, row.dataset.soluong, row.dataset.ngaymuon, 2);
        });

        fetch("admin-pages/choduyet-kiemtra.php", {
            method: "POST",
            body: new URLSearchParams({
                maphieumuon: row.dataset.maphieumuon,
                manguoidung: row.dataset.manguoidung,
                mathietbi:   row.dataset.mathietbi,
                tenthietbi:  row.dataset.tenthietbi,
                maphong:     row.dataset.maphong,
                soluong:     row.dataset.soluong,
                duyetmuon:   0
            })
        });
    }

    // Gắn event listener cho các nút
    function hookButton() {
        document.querySelectorAll(".dongy").forEach(btn =>
            btn.addEventListener("click", function () { acceptRequest(this); })
        );
        document.querySelectorAll(".tuchoi").forEach(btn =>
            btn.addEventListener("click", function () { declineRequest(this); })
        );
        document.querySelectorAll(".duyettra").forEach(btn =>
            btn.addEventListener("click", function () { verifyRequest(this); })
        );
    }

    // Tự động từ chối phiếu vượt số lượng kho
    function autoDecline(){
        fetch("admin-pages/choduyet-kiemtrakho.php", {
                method: "POST",
                body: new URLSearchParams({
                })
        })
        .then(response => response.json())
        .then(result => {
            //Nếu không có cần xóa thì khỏi gọi hàm tránh lỗi
            if(!result || result.length == 0){
                return;
            }

            //Tách từng mã phiếu mượn cần xóa trong 
            result.forEach(function(json_package){
                //Xóa ở SQL
                fetch("admin-pages/choduyet-sua.php", {
                    method: "POST",
                    body: new URLSearchParams({
                        maphieumuon: json_package.maphieumuon,
                        chon: 1,
                    })
                })
                //Thông báo tự động
                .then(response => {
                    //Update giao diện & gửi thông báo
                    document.getElementById(json_package.maphieumuon).remove();

                    sendNotification(
                        json_package.maphieumuon,
                        json_package.manguoidung,
                        json_package.mathietbi,
                        json_package.tenthietbi,
                        json_package.maphong,
                        json_package.soluong,
                        json_package.ngaymuon,
                        1
                    )
                })
                //Xong từng gói
            })
        })
    }

    // Tìm phần tử cha theo tagName (tương tự FindFirstAncestorOfClass của Roblox)
    function FindFirstAncestorOfClass(instance, className) {
        let parent = instance.parentElement;
        while (parent && parent.tagName !== className) {
            parent = parent.parentElement;
        }
        return parent || null;
    }
</script>