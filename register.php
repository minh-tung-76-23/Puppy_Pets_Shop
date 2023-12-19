<?php
    session_start();
    ob_start();
?>

<?php
    // Hiển thị thông báo thành công nếu có
    if (isset($_SESSION['register_success'])) {
        echo '<script>alert("' . $_SESSION['register_success'] . '");</script>';
        echo '<script>window.location.href = "login.php";</script>';
        unset($_SESSION['register_success']); // Xóa thông báo thành công sau khi đã hiển thị
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://kit.fontawesome.com/50f7da3bc4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/stylesign.css">

    <title>Document</title>
</head>
<body>
<div class="modal">
        <div class="modal__overlay"></div>
        <form class="modal__body" method="post" action='register_submit.php'>
            <!--Regeister  Form-->
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                        <a class="auth-form__switch-btn" href="./login.php"> Đăng nhập</a>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" placeholder="Nhập email" name="user_name">
                        </div>

                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" placeholder="Mật khẩu" name= "password">
                        </div>

                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" placeholder="Nhập lại mật khẩu" name= "repassword">
                        </div>

                        <?php
                            if (isset($_SESSION['register_error'])) {
                                
                        ?>
                        <p style="color: red; padding-top:6px; padding-left:8px;font-size:13px;"><?php echo $_SESSION['register_error'];?></p>
                        <?php
                                unset($_SESSION['register_error']); 
                            }
                        ?>

                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">
                                Bằng việc đăng ký, bạn đã đồng ý với Shoppe về
                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ </a> &
                                <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                            </p>
                        </div>
                    </div>

                    <div class="auth-form__controls">
                        <input class="btn btn--normal auth-form__controls-back" type='reset' value="HỦY"></input>
                        <input class="btn btn--primary" name="register" value="ĐĂNG KÝ" type="submit"></input>
                    </div>
                </div>

                <div class="auth-form__social">
                    <a href="" class="auth-form__social--facebook btn btn--size-s btn--witch-icon">
                        <i class="auth-form__social-icon fa-brands fa-facebook"></i>
                        <span class="auth-form__social-title">
                            Kết nối với Facebook
                        </span>
                    </a>
                    <a href="" class="auth-form__social--google btn btn--size-s btn--witch-icon">
                        <i class="auth-form__social-icon fa-brands fa-google"></i>
                        <span class="auth-form__social-title">
                            Kết nối với Google
                        </span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    ob_end_flush();
?>