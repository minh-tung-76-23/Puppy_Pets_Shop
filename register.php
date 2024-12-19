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
    <link rel="icon" href="./assets/img/logo.webp" type="image/x-icon"/>
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://kit.fontawesome.com/50f7da3bc4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/stylesign.css">

    <title>Đăng ký</title>
</head>
<body>
<header>
    <section class="home">
        <div class="mid_header">
            <div class="logo_shop">
                <a href="./index.php"><img src="./assets/img/logo.webp" alt=""></a>
            </div>

            <div class="content_logo">
                <h1>Puppy Pets Shop</h1>
                <p>Đăng Ký</p>
            </div>
        </div>
    </section>
</header>

<section class="content_mid">
    <div class="content_mid-left">
        <img src="./assets/img/24752a13769047.56277daf47f76.png" alt="">
    </div>
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
</section>
<footer>
        <section class="bot_footer">
            <div class="bot_ft">
                <div class="bot_ft-left">
                    <div class="bot_ft-l-top">
                        <div class="bot_ft-items">
                            <ul><span>Hướng dẫn</span>
                                <li class="item_li-1">
                                    <a href="">Hướng dẫn mua hàng</a>
                                </li>

                                <li>
                                    <a href="">Hướng dẫn thanh toán</a>
                                </li>

                                <li>
                                    <a href="">Điều khoản dịch vụ</a>
                                </li>

                                <li>
                                    <a href="">Phương thức thanh toán</a>
                                </li>

                                <li>
                                    <a href="">Giải quyết khiếu nại</a>
                                </li>

                            </ul>
                        </div>

                        <div class="bot_ft-items">
                            <ul><span>Chính sách công ty</span>
                                <li>
                                    <a href="">Quy định sử dụng</a>
                                </li>

                                <li>
                                    <a href="">Chính sách Bảo hành Sản phẩm</a>
                                </li>

                                <li>
                                    <a href="">Chính sách đổi trả</a>
                                </li>

                                <li>
                                    <a href="">Chính sách tích điểm khách hàng</a>
                                </li>

                                <li>
                                    <a href="">Chính sách giao hàng</a>
                                </li>

                                <li>
                                    <a href="">Chính sách bảo mật thông tin</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="pay">
                        <h4>Chấp nhận thanh toán</h4>
                        <img src="./assets/img/payment.webp" alt="">
                    </div>
                </div>
    
                <div class="bot_ft-right">
                    <div class="bot_ft-contact">
                        <div class="contact-items">
                            <h4>Hotline liên hệ:</h4>

                            <div class="hotline">
                                <img src="./assets/img/icon-telephone.webp" alt="">
                                <div class="hotline-num">
                                    <p>091.898.5026</p>
                                    <p>(Tất cả các ngày trong tuần )</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-items">
                            <h4>Kết nối với chúng tôi</h4>

                            <div class="icon-connect">
                                <a href="">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="">
                                    <i class="fa fa-google-plus"></i>
                                </a>

                                <a href="">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>

                        <div class="contact-items">
                            <h4>CHỨNG NHẬN</h4>

                            <img src="./assets/img/guarantee_img.webp" alt="">
                        </div>
                    </div>

                    <div class="link">
                        <h4> Hệ thống cửa hàng & liên kết</h4>
                        <h5>Puppy Pet Shop</h5>
                        <p>242 Kim Mã, Ba Đình</p>
                        <p>Hotline: 0971111242</p>
                        <p class="distance">----------------------------------</p>
                        <h5>Petshop liên kết</h5>
                        <h5>Petshop Văn Quán</h5>
                        <p>32BT8 KDT Văn Quán, Hà Đông (cổng trường Tiểu học Ban Mai)</p>
                        <p>Hotline: 0981111328</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="end_ft">
            <span>© Bản quyền thuộc về</span> 
            <a href="https://puppypetshop.com.vn">Puppy Pet Shop</a>
            <span>. GPDKKD số 01A8017619 do UBND quận Ba Đình cấp ngày 19/01/2015.</span>
        </div>
    </footer>
</body>
</html>

<?php
    ob_end_flush();
?>