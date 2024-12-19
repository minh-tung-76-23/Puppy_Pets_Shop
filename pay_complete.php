<?php

    include './config.php';

    session_start(); // Bắt buộc phải có dòng này để sử dụng session

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

            $payId = isset($_GET['id']) ? $_GET['id'] : null;

            // Lấy thông tin về ngày đặt và số tiền trước khi xóa dịch vụ
            $sql_get_info = "SELECT * FROM tbl_service_register WHERE ser_id = '$payId'";
            $result_info = $conn->query($sql_get_info);
            $row_info = $result_info->fetch_assoc();
            
            $ser_time = $row_info['ser_time'];
            // Loại bỏ các ký tự không phải số từ chuỗi
            $doanhthu = preg_replace("/[^0-9]/", "", $row_info['ser_total']);
            $doanhthu = floatval($doanhthu);

            // Cập nhật bảng tbl_thongke sau khi hoàn thành dịch vụ
            $sql_update_thongke = "UPDATE tbl_thongke 
                                SET soluongdon = soluongdon + 1,
                                        doanhthu = doanhthu + '$doanhthu'
                                WHERE ngaydat = '$ser_time'";
            $conn->query($sql_update_thongke);

            // Gán trạng thái thanh toán thành công vào session
            if (!isset($_SESSION['pay_complete']) || !is_array($_SESSION['pay_complete'])) {
                $_SESSION['pay_complete'] = []; // Khởi tạo mảng rỗng nếu chưa có
            }

            if (!in_array($payId, $_SESSION['pay_complete'])) {
                $_SESSION['pay_complete'][] = $payId; // Thêm ID vào mảng
            }

            echo <<<HTML
            <script>
                Swal.fire({
                    title: 'Thanh toán thành công!',
                    icon: 'success', // Biểu tượng dấu tích
                    showConfirmButton: false,  // Ẩn nút xác nhận
                    timer: 2000  // Thời gian tự động đóng sau 2 giây
                });

                setTimeout(function() {
                    window.location.href = "user.php";
                }, 1900);
            </script>
            HTML;

        ?>

    </body>

</html>
