<?php
    session_start();
    ob_start();
    include 'config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (isset($_POST['register'])) {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $level = 0;
        if ($user_name == '' || $password == '' || $repassword == '') {
            $_SESSION['register_error'] = "Vui lòng nhập đầy đủ thông tin!";
            header('Location:register.php');

        } else {
            if ($password != $repassword) {
                $_SESSION['register_error'] = 'Mật khẩu nhập lại không chính xác!';
                header('Location:register.php');

            } else {
                $sql_check = "SELECT * FROM tbl_user WHERE user_username = '$user_name'";
                $register_check = $conn->query($sql_check);
                // $password = md5($password);
        
                if($register_check->num_rows > 0) {
                    // header("Location:register.php");
                    $_SESSION['register_error'] = "Tài khoản đã tồn tại!";
                    header('Location:register.php');

                } else {
                    $sql_register = "INSERT INTO tbl_user (user_username,user_password,user_role) VALUES ('$user_name','$password','$level')";
                    $register = $conn->query($sql_register);
                    $_SESSION['register_success'] = 'Đăng ký thành công!';
                    header('Location: register.php');
                }
            }
        }
    } else {
        header('Location:register.php');
    }
    ob_end_flush(); 

?>