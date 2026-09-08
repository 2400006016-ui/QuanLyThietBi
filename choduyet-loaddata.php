<?php
//Sửa giao diện thôi, đừng phá code kỹ thuật
    include "../db.php";
    $load = $_POST['load'];

    if($load == 0){
        //Tìm chờ duyệt trong bảng phieu_muon
        $phieu_muon = mysqli_query($conn, "SELECT * FROM phieu_muon WHERE TrangThai = 'Chờ duyệt'");

        //Lấy từng dòng trong bảng thiet_bi
        while ($pm = mysqli_fetch_assoc($phieu_muon)) {
            $ngayMuon = date("d/m/Y H:i", strtotime($pm['NgayMuon']));

            echo "
                <tr id='{$pm['MaPhieuMuon']}'
                    data-maphieumuon='{$pm['MaPhieuMuon']}'
                    data-manguoidung='{$pm['MaNguoiDung']}'
                    data-mathietbi='{$pm['MaThietBi']}'
                    data-tenthietbi='{$pm['TenThietBi']}'
                    data-maphong='{$pm['MaPhong']}'
                    data-soluong='{$pm['SoLuong']}'
                    data-ngaymuon='{$ngayMuon}'
                >

                    <td>
                        {$pm['MaPhieuMuon']}
                    </td>
                    <td>
                        {$pm['MaNguoiDung']}
                    </td>
                    <td>
                        {$pm['MaThietBi']}
                    </td>
                    <td>
                        {$pm['TenThietBi']}
                    </td>
                    <td>
                        {$pm['MaPhong']}
                    </td>
                    <td>
                        {$pm['SoLuong']}
                    </td>
                    <td>
                        {$ngayMuon}
                    </td>
                    <td>
                        {$pm['TrangThai']}
                    </td>

                    <td>
                        <button
                            data-maphieumuon='{$pm['MaPhieuMuon']}'
                            class=\"dongy\"
                        >
                        Đồng ý
                        </button>

                        <button
                            data-maphieumuon='{$pm['MaPhieuMuon']}'
                            class=\"tuchoi\"
                        >
                        Từ chối
                        </button>
                    </td>
                </tr>
            ";
        }
    }else{
        //Tìm đang dùng trong bảng phieu_muon
        $phieu_muon = mysqli_query($conn, "SELECT * FROM phieu_muon WHERE TrangThai = 'Duyệt mượn'");

        //Lấy từng dòng trong bảng thiet_bi
        while ($pm = mysqli_fetch_assoc($phieu_muon)) {
            $ngayMuon = date("d/m/Y H:i", strtotime($pm['NgayMuon']));
            $ngayTra = date("d/m/Y H:i", strtotime($pm['NgayTra']));
            
            echo "
                <tr id='{$pm['MaPhieuMuon']}'
                    data-maphieumuon='{$pm['MaPhieuMuon']}'
                    data-manguoidung='{$pm['MaNguoiDung']}'
                    data-mathietbi='{$pm['MaThietBi']}'
                    data-tenthietbi='{$pm['TenThietBi']}'
                    data-maphong='{$pm['MaPhong']}'
                    data-soluong='{$pm['SoLuong']}'
                    data-ngaymuon='{$ngayMuon}'
                >

                    <td>
                        {$pm['MaPhieuMuon']}
                    </td>
                    <td>
                        {$pm['MaNguoiDung']}
                    </td>
                    <td>
                        {$pm['MaThietBi']}
                    </td>
                    <td>
                        {$pm['TenThietBi']}
                    </td>
                    <td>
                        {$pm['MaPhong']}
                    </td>
                    <td>
                        {$pm['SoLuong']}
                    </td>
                    <td>
                        {$ngayMuon}
                    </td>
                    <td>
                        {$pm['TrangThai']}
                    </td>

                    <td>
                        <button
                            data-maphieumuon='{$pm['MaPhieuMuon']}'
                            class=\"duyettra\"
                        >
                        Đã trả
                        </button>

                    </td>
                </tr>
            ";
        }
    }

?>