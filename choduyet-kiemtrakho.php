<?php
    include "../db.php";
    //Tạo danh sách các gói từ chối
    //Tạo mảng $data lần đầu
    //Cú pháp tạo mảng
    $data = [];

    //Từ chối những phiếu mà ko đủ số lượng trong kho & phiếu mà admin chưa update bằng reload
    //Lấy tất cả mã thiết bị
    $table = mysqli_query($conn,"
                SELECT * FROM thiet_bi
    ");
    while($result = mysqli_fetch_assoc($table)){
        //Lấy từng thiết bị ra so
        $sum = 0;
        $dang_muon = mysqli_query($conn,"
                SELECT * FROM thiet_bi_muon
                WHERE MaThietBi = '{$result['MaThietBi']}'
        ");
        
        //Tổng số lượng đang mượn
        while($soluong = mysqli_fetch_assoc($dang_muon)){
            $sum += (int)$soluong['SoLuong'];
        }
        //Só thiết bị còn lại
        $remains = (int)($result['SoLuong'] - $sum);

        //Xuất các mã phiếu mượn cần từ chối
        $phieu_muon = mysqli_query($conn,"
            SELECT * FROM phieu_muon
            WHERE TrangThai = 'Chờ duyệt'
            AND MaThietBi = '{$result['MaThietBi']}'
        ");
        while($phieu = mysqli_fetch_assoc($phieu_muon)){
            if($phieu['SoLuong'] > $remains){

                //Insert thêm vào mảng
                //Đây là cú pháp insert, ko phải ghi đè
                //Ghi đè bằng $data = []; 
                $data[] = [
                    "maphieumuon" => $phieu['MaPhieuMuon'],
                    "manguoidung" => $phieu['MaNguoiDung'],
                    "mathietbi" => $phieu['MaThietBi'],
                    "tenthietbi" => $phieu['TenThietBi'],
                    "maphong" => $phieu['MaPhong'],
                    "soluong" => $phieu['SoLuong'],
                    "ngaymuon" => $phieu['NgayMuon']
                ];
            }
        }
        //Xong phần của thiết bị ở loop này
    }
    //Xuất thành gói danh sách cần từ chối
    echo json_encode($data);
?>