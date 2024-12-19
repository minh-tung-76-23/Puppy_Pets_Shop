<?php
    session_start();
    include './config.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Successfully</title>
        <link rel="stylesheet" href="./assets/css/loadstyle.css">
        <script type="text/javascript" src="assets/js/load.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <script src="sweetalert2.min.js"></script>

    </head>
    <body>
        <div class="loading" id="loading" >
            <img src="https://thumbs.gfycat.com/HighCorruptIsabellineshrike-max-1mb.gif" alt="loading">
        </div>
        <?php
            $serId = isset($_GET['id']) ? $_GET['id'] : null;

            // Lấy thông tin về ngày đặt và số tiền trước khi xóa dịch vụ
            $sql_get_info = "SELECT ser_time, ser_total FROM tbl_service_register WHERE ser_id = '$serId'";
            $result_info = $conn->query($sql_get_info);
            $row_info = $result_info->fetch_assoc();
            
            $ser_time = $row_info['ser_time'];

            $sql_serdel = "DELETE FROM tbl_service_register WHERE ser_id = '$serId'";
            $del_prdt = $conn->query($sql_serdel);

            if ($del_prdt) {
                // Cập nhật bảng tbl_thongke sau khi xóa dịch vụ
                $sql_update_thongke = "UPDATE tbl_thongke 
                                    SET donhang = donhang - 1
                                    WHERE ngaydat = '$ser_time'";
                $conn->query($sql_update_thongke);

                echo <<<HTML
                <script>
                    Swal.fire({
                        title: 'Huỷ dịch vụ thành công!',
                        icon: 'success', // Biểu tượng dấu tích
                        showConfirmButton: false,  // Ẩn nút xác nhận
                        timer: 2000  // Thời gian tự động đóng sau 2 giây
                    });

                    setTimeout(function() {
                        window.location.href = "user.php";
                    }, 1900);
                </script>
                HTML;
            }
        ?>
    </body>
</html>

