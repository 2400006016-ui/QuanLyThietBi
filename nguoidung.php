<!--Biến id vì lý do hạn chế kiến thức ban đầu nên nó theo "username" chứ ko phải "manguoidung"! -->
<div class="admin-page-content">

    <!-- Panel chỉnh sửa (ẩn mặc định) -->
    <div id="bangtuychinh" style="display: none;">
        <input type="hidden" id="id">
        <input type="hidden" id="manguoidung" placeholder="Mã người dùng">
        <input type="text"   id="username"    placeholder="Username">
        <input type="text"   id="matkhau"     placeholder="Mật khẩu">
        <input type="text"   id="ten"         placeholder="Tên">
        <input type="number" id="mssv"        placeholder="Mã số">
        <input type="text"   id="email"       placeholder="Email">
        <div>
            <p>Quyền hạn</p>
            <p id="quyen"></p>
            <button id="button-quyen1">Sinh Viên</button>
            <button id="button-quyen2">Giáo viên</button>
            <button id="button-quyen3">Quản lý</button>
        </div>
        <button class="button-luu">Lưu</button>
        <button class="button-huy">Hủy</button>
        <p class="result-notification"></p>
        
    </div>

    <!-- Panel gửi thông báo (ẩn mặc định) -->
    <div id="bangthongbao" style="display: none;">
        <input type="hidden" id="manguoidung-thongbao">
        <p id="ten-thongbao"></p>
        <input type="text" id="tieude"  placeholder="Tiêu đề (200 chữ)">
        <input type="text" id="noidung" placeholder="Nội dung">
        <button class="button-gui2">Gửi</button>
        <button class="button-huy2">Hủy</button>
    </div>

    <!-- Bảng dữ liệu -->
    <div>
        <div>
            <input type="text"   id="tk1" placeholder="Mã người dùng">
            <input type="text"   id="tk2" placeholder="Username">
            <input type="hidden" id="tk3" placeholder="Mật khẩu">
            <input type="text"   id="tk4" placeholder="Tên">
            <input type="text"   id="tk5" placeholder="Mã số Sinh viên">
            Quyền hạn
            <select id="tk6">
                <option value="">Tất cả</option>
                <option value="Admin">Admin</option>
                <option value="QuanLy">QuanLy</option>
                <option value="SinhVien">SinhVien</option>
                <option value="GiangVien">GiangVien</option>
            </select>
            <input type="text" id="tk7" placeholder="Email">
            <button class="button-timkiem">Tìm kiếm</button>
        </div>

        <div class="table-wrap">
        <table id="bang-nguoidung">
            <colgroup>
                <col class="col-manguoidung">
                <col class="col-username">
                <col class="col-matkhau">
                <col class="col-ten">
                <col class="col-mssv">
                <col class="col-quyen">
                <col class="col-email">
                <col class="col-thaotac">
                <col class="col-them">
            </colgroup>
            <thead>
                <tr>
                    <th>Mã người dùng</th>
                    <th>Username</th>
                    <th>Mật khẩu</th>
                    <th>Tên</th>
                    <th>Mã số Sinh viên</th>
                    <th>Quyền hạn</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                    <th><button id="them">Thêm</button></th>
                </tr>
            </thead>
            <tbody id="table-content">
                <?php
                    $nguoi_dung = mysqli_query($conn, "SELECT * FROM nguoi_dung");
                    while ($nd = mysqli_fetch_assoc($nguoi_dung)) {
                        if (($nd['Quyen'] == 'Admin' || $nd['Quyen'] == 'QuanLy') && $_SESSION['role'] != 'Admin') {
                            continue;
                        }

                        echo "
                            <tr id='{$nd['TenDangNhap']}'>
                                <td>{$nd['MaNguoiDung']}</td>
                                <td>{$nd['TenDangNhap']}</td>
                                <td>{$nd['MatKhau']}</td>
                                <td>{$nd['HoTen']}</td>
                                <td>{$nd['mssv']}</td>
                                <td>{$nd['Quyen']}</td>
                                <td>{$nd['Email']}</td>
                                <td>
                                    <div class=\"action-cell\">
                                        <button class=\"tuychinh\"
                                            data-id='{$nd['TenDangNhap']}'
                                            data-manguoidung='{$nd['MaNguoiDung']}'
                                            data-username='{$nd['TenDangNhap']}'
                                            data-matkhau='{$nd['MatKhau']}'
                                            data-ten='{$nd['HoTen']}'
                                            data-mssv='{$nd['mssv']}'
                                            data-quyen='{$nd['Quyen']}'
                                            data-email='{$nd['Email']}'
                                            title=\"Chỉnh sửa\">
                                            <i class=\"bi bi-pencil\"></i>
                                        </button>
                                        <button class=\"xoa\"
                                            data-id='{$nd['TenDangNhap']}'
                                            data-quyen='{$nd['Quyen']}'
                                            title=\"Xóa\">
                                            <i class=\"bi bi-trash\"></i> Xóa
                                        </button>
                                        <button class=\"thongbao\"
                                            data-id='{$nd['MaNguoiDung']}'
                                            data-ten='{$nd['HoTen']}'
                                            data-email='{$nd['Email']}'
                                            title=\"Gửi thông báo\">
                                            <i class=\"bi bi-bell\"></i> Thông báo
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>

</div>

<script>
    let chon;
    let currentButton;

    // Nút lưu
    document.querySelector(".button-luu").addEventListener("click", function () {
        const id          = document.getElementById("id").value;
        const manguoidung = document.getElementById("manguoidung").value;
        const username    = document.getElementById("username").value;
        const matkhau     = document.getElementById("matkhau").value;
        const ten         = document.getElementById("ten").value;
        const mssv        = document.getElementById("mssv").value;
        const quyen       = document.getElementById("quyen").textContent;
        const email       = document.getElementById("email").value;

        if (chon === 0) {
            //Lấy dòng cần sửa trước rồi kiểm tra có sửa được hay ko sau
            const row = document.getElementById(id);
            //Gửi lên SQL trước
            fetch("admin-pages/nguoidung-sua.php", {
                method: "POST",
                body: new URLSearchParams({ id, manguoidung, username, matkhau, ten, mssv, quyen, email, chon })
            })
            //Nếu sai khỏi Update
            //Trả về 1 promise trước
            //Nếu dùng .text() thì result phải JSON.parse(<result>) trước;
            .then(response => response.json())
            //Lấy kết quả, gói json đã được gửi sau khi update SQL
            .then(result => {
                console.log(result);
                if(result.result == "success"){
                    document.querySelector(".result-notification").textContent = "";
                    const id          = result.username;
                    const manguoidung = result.manguoidung;
                    const username    = result.username;
                    const matkhau     = result.matkhau;
                    const ten         = result.ten;
                    const mssv        = result.mssv;
                    const quyen       = result.quyen;
                    const email       = result.email;

                    row.cells[0].textContent = manguoidung;
                    row.cells[1].textContent = username;
                    //Mật khẩu bản thân ko chỉnh sửa sẽ gửi "" chứ ko phải null/nil
                    if(matkhau != "") row.cells[2].textContent = matkhau;
                    row.cells[3].textContent = ten;
                    row.cells[4].textContent = mssv;
                    row.cells[5].textContent = quyen;
                    row.cells[6].textContent = email;
                    row.id = username;

                    currentButton.dataset.id          = username;
                    currentButton.dataset.manguoidung = manguoidung;
                    currentButton.dataset.username    = username;
                    if(matkhau != "") currentButton.dataset.matkhau = matkhau;
                    currentButton.dataset.ten         = ten;
                    currentButton.dataset.mssv        = mssv;
                    currentButton.dataset.quyen       = quyen;
                    currentButton.dataset.email       = email;

                    document.getElementById("id").value = username;
                    currentButton.parentElement.querySelector(".xoa").dataset.id = username;
                    currentButton.parentElement.querySelector(".thongbao").dataset.id = manguoidung;
                    currentButton.parentElement.querySelector(".thongbao").dataset.ten = ten;
                    currentButton.parentElement.querySelector(".thongbao").dataset.email = email;

                }else{
                    document.querySelector(".result-notification").textContent = "Lỗi cập nhật không khả dụng!";
                }
            });
        }

        if (chon === 3) {
            fetch("admin-pages/nguoidung-sua.php", {
                method: "POST",
                body: new URLSearchParams({ id, manguoidung, username, matkhau, ten, mssv, quyen, email, chon })
            })
            //Nếu sai khỏi Update
            //Trả về 1 promise trước
            //Nếu dùng .text() thì result phải JSON.parse(<result>) trước;
            .then(response => response.json())
            //Lấy kết quả, gói json đã được gửi sau khi update SQL
            .then(result => {
                console.log(result);
                if(result.result == "success"){
                    document.querySelector(".result-notification").textContent = "";
                    const id          = result.username;
                    const manguoidung = result.manguoidung;
                    const username    = result.username;
                    const matkhau     = result.matkhau;
                    const ten         = result.ten;
                    const mssv        = result.mssv;
                    const quyen       = result.quyen;
                    const email       = result.email;
                    
                document.getElementById("table-content").innerHTML += `
                    <tr id='${username}'>
                        <td>${manguoidung}</td>
                        <td>${username}</td>
                        <td>${matkhau}</td>
                        <td>${ten}</td>
                        <td>${mssv}</td>
                        <td>${quyen}</td>
                        <td>${email}</td>
                        <td>
                            <div class="action-cell">
                                <button class="tuychinh"
                                    data-id='${username}'
                                    data-manguoidung='${manguoidung}'
                                    data-username='${username}'
                                    data-matkhau='${matkhau}'
                                    data-ten='${ten}'
                                    data-mssv='${mssv}'
                                    data-quyen='${quyen}'
                                    data-email='${email}'
                                    title="Chỉnh sửa">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="xoa"
                                    data-id='${username}'
                                    data-quyen='${quyen}'
                                    title="Xóa">
                                    <i class="bi bi-trash"></i> Xóa
                                </button>
                                <button class="thongbao"
                                    data-id='${manguoidung}'
                                    data-ten='${ten}'
                                    data-email='${email}'
                                    title="Gửi thông báo">
                                    <i class="bi bi-bell"></i> Thông báo
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
                hookButton();

                }else{
                    document.querySelector(".result-notification").textContent = "Lỗi cập nhật không khả dụng!";
                }
            })

        }
    });

    // Nút hủy
    document.querySelector(".button-huy").addEventListener("click", function () {
        document.getElementById("bangtuychinh").style.display = "none";
    });

    // Nút thêm
    document.getElementById("them").addEventListener("click", function () {
        document.getElementById("id").value          = "";
        document.getElementById("manguoidung").value = "";
        document.getElementById("username").value    = "";
        document.getElementById("matkhau").value     = "";
        document.getElementById("ten").value         = "";
        document.getElementById("mssv").value        = "";
        document.getElementById("email").value       = "";
        document.getElementById("quyen").textContent = "";
        document.getElementById("bangtuychinh").style.display = "block";
        chon = 3;
    });

    // Nút cấp quyền Sinh viên
    document.getElementById("button-quyen1").addEventListener("click", function () {
        if (document.getElementById("quyen").textContent === "Admin") return;
        document.getElementById("quyen").textContent = "SinhVien";
    });

    // Nút cấp quyền Giáo viên
    document.getElementById("button-quyen2").addEventListener("click", function () {
        if (document.getElementById("quyen").textContent === "Admin") return;
        document.getElementById("quyen").textContent = "GiangVien";
    });

    // Nút cấp quyền Quản lý
    document.getElementById("button-quyen3").addEventListener("click", function () {
        if (document.getElementById("quyen").textContent === "Admin") return;
        if (role !== 'Admin') return;
        document.getElementById("quyen").textContent = "QuanLy";
    });

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

    // Nút gửi thông báo
    document.querySelector(".button-gui2").addEventListener("click", function () {
        const manguoidung = document.getElementById("manguoidung-thongbao").value;
        const tieude      = document.getElementById("tieude").value;
        const noidung     = document.getElementById("noidung").value;

        fetch("admin-pages/nguoidung-thongbao.php", {
            method: "POST",
            body: new URLSearchParams({ manguoidung, tieude, noidung })
        });
    });

    // Nút hủy thông báo
    document.querySelector(".button-huy2").addEventListener("click", function () {
        document.getElementById("bangthongbao").style.display = "none";
    });

    // Gắn event listener cho các nút
    function hookButton() {
        // Nút tùy chỉnh
        document.querySelectorAll(".tuychinh").forEach(function (btn) {
            btn.addEventListener("click", function () {
                if ((this.dataset.quyen === 'QuanLy' || this.dataset.quyen === 'Admin') && role !== 'Admin') return;

                document.getElementById("id").value          = this.dataset.id;
                document.getElementById("manguoidung").value = this.dataset.manguoidung;
                document.getElementById("username").value    = this.dataset.username;
                document.getElementById("matkhau").value     = "";
                document.getElementById("ten").value         = this.dataset.ten;
                document.getElementById("mssv").value        = this.dataset.mssv;
                document.getElementById("email").value       = this.dataset.email;
                document.getElementById("quyen").textContent = this.dataset.quyen;

                document.getElementById("bangtuychinh").style.display = "block";
                chon = 0;
                currentButton = this;
            });
        });

        // Nút xóa
        document.querySelectorAll(".xoa").forEach(function (btn) {
            btn.addEventListener("click", function () {
                if (this.dataset.quyen === "Admin") return;
                if (this.dataset.quyen === "QuanLy" && role === 'QuanLy') return;

                const id = this.dataset.id;
                document.getElementById(id).remove();

                fetch("admin-pages/nguoidung-sua.php", {
                    method: "POST",
                    body: new URLSearchParams({ chon: 1, id })
                });
            });
        });

        // Nút gọi bảng thông báo
        document.querySelectorAll(".thongbao").forEach(function (btn) {
            btn.addEventListener("click", function () {
                document.getElementById("bangthongbao").style.display = "block";
                document.getElementById("manguoidung-thongbao").value = this.dataset.id;
                document.getElementById("ten-thongbao").textContent   = this.dataset.ten;
                document.getElementById("tieude").value  = "";
                document.getElementById("noidung").value = "";
            });
        });
    }

    hookButton();
</script>