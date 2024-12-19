<?php
    session_start();
    ob_start();
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
        <div class="loading" id="loading">
            <img src="https://thumbs.gfycat.com/HighCorruptIsabellineshrike-max-1mb.gif" alt="loading">
        </div>
<?php
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
                    echo <<<HTML
                        <script>
                            Swal.fire({
                                title: 'Đăng ký thành công!',
                                icon: 'success', // Biểu tượng dấu tích
                                showConfirmButton: false,  // Ẩn nút xác nhận
                                timer: 2000  // Thời gian tự động đóng sau 2 giây
                            });

                            setTimeout(function() {
                                window.location.href = "login.php";
                            }, 1900);
                        </script>
                    HTML;
                }
            }
        }
    } else {
        header('Location:register.php');
    }
    ob_end_flush(); 

?>
</body>
</html>