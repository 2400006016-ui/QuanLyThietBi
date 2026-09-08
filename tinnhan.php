<p>Tin nhắn của bạn</p>
<div>
    <div>
        <?php
        //Dùng chung cho cả Admin, Quản lý
        $manager_id = -1;

        $result = mysqli_query($conn, "
            SELECT * FROM thong_bao_nhac_nho
            WHERE ma_nguoi_dung = '{$manager_id}';
        ");

        if(mysqli_num_rows($result) > 0){
            echo "
            <table>
                <thead>
                    <tr>
                        <td>
                            Tiêu đề
                        </td>
                        <td>
                            Nội dung
                        </td>
                        <td>
                            Trạng thái
                        </td>
                    </tr>
                </thead>
                <tbody>
            ";
                while($row = mysqli_fetch_assoc($result)){
                    $trangthai = "";
                    if($row['da_doc'] == (int)0){
                        $trangthai = 'Chưa đọc';

                        //Update lên đã đọc, nhưng hiện tại hiện chưa đọc để tránh bị bỏ sót khi load lần đầu
                        mysqli_query($conn,"
                            UPDATE thong_bao_nhac_nho
                            SET da_doc = 1
                            WHERE id = '{$row['id']}'
                        ");
                    }else{
                        $trangthai = 'Đã đọc';
                    }
                    
                    //Bắt đầu render dòng đó
                    echo "
                    <tr>
                        <td>
                            {$row['tieu_de']}
                        </td>
                        <td>
                            {$row['noi_dung']}
                        </td>
                        <td>
                            {$trangthai}
                        </td>
                    </tr>
                    ";
                }
            echo "
                </tbody>
            </table>
            ";
        }else{
            echo "
            <p>
                Chưa có tin nhắn.
            </p>
            ";
        }
        ?>
    </div>
</div>