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
        $ser_info = $_POST['txtinfo'];
        $ser_total = $_POST['txttotal'];
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
        $sql_insert = "INSERT INTO tbl_service_register (
            service_id, 
            user_id, 
            ser_name, 
            ser_email, 
            ser_time, 
            ser_sdt, 
            ser_diachi, 
            ser_info, 
            ser_total
            ) VALUES ('$service_id', '
                                $user_id', 
                                '$ser_name', 
                                '$ser_email', 
                                '$ser_time', 
                                '$ser_sdt', 
                                '$ser_diachi',
                                '$ser_info',
                                '$ser_total'
                                )";
        $result = $conn->query($sql_insert);

        if ($result) {
            // Kiểm tra xem có bản ghi nào trong tbl_thongke có ngày trùng với ngày đăng ký hay không
            $sql_check_existing_record = "SELECT * FROM tbl_thongke WHERE ngaydat = '$ser_time'";
            $result_check_existing_record = $conn->query($sql_check_existing_record);

            if ($result_check_existing_record->num_rows > 0) {
                // Nếu có bản ghi, thực hiện cập nhật giá trị cột donhang
                $sql_update_thongke = "UPDATE tbl_thongke SET donhang = donhang + 1 WHERE ngaydat = '$ser_time'";
                $conn->query($sql_update_thongke);
            } else {
                // Nếu không có bản ghi, thêm một bản ghi mới
                $sql_insert_thongke = "INSERT INTO tbl_thongke (ngaydat, donhang, doanhthu, soluongdon) VALUES ('$ser_time', 1, 0, 0)";
                $conn->query($sql_insert_thongke);
            }

            // Đăng ký thành công
            $_SESSION['register-ser_success'] = 'Đăng ký dịch vụ thành công!';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            // Đăng ký thất bại
            echo 'Đăng ký thất bại';
            $_SESSION['register-ser_err'] = 'Đăng ký dịch vụ thất bại!';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    ob_end_flush(); 
?>