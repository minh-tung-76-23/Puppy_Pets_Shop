<?php
    session_start();
    ob_start();
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/50f7da3bc4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/stylesign.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Đăng nhập</title>
</head>
<body>
    <div class="modal__overlay"></div>
        <form class="modal__body" method="post" action="login_submit.php">
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng nhập </h3>
                        <a class="auth-form__switch-btn" href="./register.php"> Đăng ký</a>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" placeholder="Nhập email" name="user_name">
                        </div>

                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" placeholder="Mật khẩu" name="password">
                        </div>
                        <?php
                            if (isset($_SESSION['login_error'])) {
                                
                        ?>
                        <p style="color: red; padding-top:6px; padding-left:8px;font-size:13px;"><?php echo $_SESSION['login_error'];?></p>
                        <?php
                                unset($_SESSION['login_error']); // Xóa thông báo lỗi sau khi đã hiển thị
                            }
                        ?>

                        <div class="auth-form__aside">
                            <div class="auth-form__help">
                                <a href="" class="auth-form__help-link auth-form__help-forgot"> Quên mật khẩu </a>
                                <span class="auth-form__help-spearate"></span>
                                <a href="" class="auth-form__help-link"> Cần trợ giúp? </a>
                            </div>
                        </div>
                    </div>

                    <div class="auth-form__controls">
                        <button class="btn btn--normal auth-form__controls-back"><a href="./index.php">TRỞ LẠI</a></button>
                        <input type="submit" class="btn btn--primary" name="login" value="ĐĂNG NHẬP"></input>
                    </div>
                </div>

                <div class="auth-form__social">
                    <a href="" class="auth-form__social--facebook btn btn--size-s btn--witch-icon">
                        <i class="auth-form__social-icon fa-brands fa-facebook"></i>
                        <span class="auth-form__social-title">
                            Đăng nhập Facebook
                        </span>
                    </a>
                    <a href="" class="auth-form__social--google btn btn--size-s btn--witch-icon">
                        <i class="auth-form__social-icon fa-brands fa-google"></i>
                        <span class="auth-form__social-title">
                            Đăng nhập Google
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