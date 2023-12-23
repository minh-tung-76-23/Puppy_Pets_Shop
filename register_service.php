<?php 
    session_start();
    ob_start();
    include 'config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (isset($_POST['submit'])) {
        $ser_name = $_POST['txthoten'];
        $ser_email = $_POST['txtemail'];
        $ser_sdt = $_POST['txtsdt'];
        $ser_diachi = $_POST['txtdiachi'];
        $service_name = $_POST['txtdichvu'];
        $user_username = $_SESSION['username'];

         // Lấy thời gian hiện tại
        $ser_time = date("Y-m-d");

         // Lấy id của dịch vụ từ bảng tbl_service
        $sql_get_service_id = "SELECT service_id FROM tbl_service WHERE service_name = '$service_name'";
        $result_service_id = $conn->query($sql_get_service_id);
        $row_service_id = $result_service_id->fetch_assoc();
        $service_id = $row_service_id['service_id'];

        // Lấy id của kh từ bảng tbl_user
        $sql_get_user_id = "SELECT user_id FROM tbl_user WHERE user_username = '$user_username'";
        $result_user_id = $conn->query($sql_get_user_id);
        $row_user_id = $result_user_id->fetch_assoc();
        $user_id = $row_user_id['user_id'];

        // Thực hiện chèn dữ liệu vào bảng tbl_service_register
        $sql_insert = "INSERT INTO tbl_service_register (service_id, user_id, ser_name, ser_email, ser_time, ser_sdt, ser_diachi) VALUES ('$service_id', '$user_id', '$ser_name', '$ser_email', '$ser_time', '$ser_sdt', '$ser_diachi')";
        $result = $conn->query($sql_insert);

        if ($result) {
            // Đăng ký thành công, bạn có thể thực hiện các hành động khác ở đây
            $_SESSION['register-ser_success'] = 'Đăng ký dịch vụ thành công!';
            // Chuyển hướng về trang vừa đăng ký
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            // Đăng ký thất bại, hiển thị thông báo lỗi hoặc thực hiện các xử lý khác
            echo 'Đăng ký thất bại';
            $_SESSION['register-ser_err'] = 'Đăng ký dịch vụ thất bại!';
            // Chuyển hướng về trang vừa đăng ký
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    ob_end_flush(); 
?>