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

            if (isset($_POST['create_order'])) {
                $order_email = $_POST['txtemail'];
                $order_name = $_POST['txtfullname'];
                $order_sdt = $_POST['txtphone'];
                $order_city = $_POST['txtcity'];
                $order_district = $_POST['txtdistrict'];
                $order_ward = $_POST['txtward'];
                $order_address = $_POST['txtaddress'] . ', ' . $_POST['txtward'] . ', ' . $_POST['txtdistrict'] . ', ' . $_POST['txtcity'];
                $order_payment_method = $_POST['txtpayment_method'];
                $order_note = $_POST['txtnote'];
                $all_total = $_POST['txtall_total'];
                $user_username = $_SESSION['username'];
                
                // Lấy thời gian hiện tại
                $order_time = date("Y-m-d");

                // Lấy id của user từ bảng tbl_user
                $sql_get_user_id = "SELECT user_id FROM tbl_user WHERE user_username = '$user_username'";
                $result_user_id = $conn->query($sql_get_user_id);
                $row_user_id = $result_user_id->fetch_assoc();
                $user_id = $row_user_id['user_id'];

                // Chèn dữ liệu vào bảng tbl_order_product
                $sql_insert_order = "INSERT INTO tbl_order_product (
                    order_email, order_name, order_sdt, order_address, order_pay, order_time, order_user_id, 
                    order_product_price, order_note, order_status
                ) VALUES (
                    '$order_email', '$order_name', '$order_sdt', '$order_address', '$order_payment_method', 
                    '$order_time', '$user_id', '$all_total', '$order_note', '0'
                )";
                $result = $conn->query($sql_insert_order);
                
                // Lấy id của đơn hàng vừa tạo
                $order_id = $conn->insert_id;

                // Thực hiện các thao tác liên quan đến giỏ hàng, cập nhật trạng thái, v.v.
                $sql_cart = "SELECT * FROM tbl_cart WHERE user_id = '$user_id' AND cart_status = '0'";
                $get_cart = $conn->query($sql_cart);
                
                if ($get_cart->num_rows > 0) {
                    while ($row_cart = $get_cart->fetch_assoc()) {
                        $cart_product_name = $row_cart['cart_name'];
                        $cart_product_quantity = $row_cart['cart_quantity'];
                        $cart_product_price = $row_cart['cart_total'];

                        $sql_insert_order_details = "INSERT INTO tbl_order_details (
                            order_id, product_name, quantity, product_price
                        ) VALUES (
                            '$order_id', '$cart_product_name', '$cart_product_quantity', '$cart_product_price'
                        )";
                        $conn->query($sql_insert_order_details);
                    }
                    $sql_update_cart = "UPDATE tbl_cart SET cart_status = '1' WHERE user_id = '$user_id' AND cart_status = '0'";
                    $conn->query($sql_update_cart);
                }

                // Kiểm tra và cập nhật dữ liệu thống kê
                $sql_check_existing_record = "SELECT * FROM tbl_thongke WHERE ngaydat = '$order_time'";
                $result_check_existing_record = $conn->query($sql_check_existing_record);
                if ($result_check_existing_record->num_rows > 0) {
                    $sql_update_thongke = "UPDATE tbl_thongke SET donhang = donhang + 1 WHERE ngaydat = '$order_time'";
                    $conn->query($sql_update_thongke);
                } else {
                    $sql_insert_thongke = "INSERT INTO tbl_thongke (ngaydat, donhang, doanhthu, soluongdon) 
                                        VALUES ('$order_time', 1, 0, 0)";
                    $conn->query($sql_insert_thongke);
                }

                // Nếu đơn hàng được tạo thành công
                if ($result) {
                    $_SESSION['order_success'] = 'Đặt hàng thành công!';
                    echo <<<HTML
                        <script>
                            
                            Swal.fire({
                                title: 'Tạo hóa đơn thành công!',
                                icon: 'success', // Biểu tượng dấu tích
                                showConfirmButton: false,  // Ẩn nút xác nhận
                                timer: 2000  // Thời gian tự động đóng sau 2 giây
                            });

                            setTimeout(function() {
                                window.location.href = "user.php";
                            }, 1900);
                        </script>
                    HTML;
                } else {
                    echo 'Đặt hàng thất bại';
                    $_SESSION['order_err'] = 'Đặt hàng thất bại!';
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }

            ob_end_flush(); 

        ?>

    </body>
</html>
