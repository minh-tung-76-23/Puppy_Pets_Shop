<?php
    session_start();
    include './config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

?>

<!DOCTYPE html>
<html lang="en" data-current-page="<?php echo basename($_SERVER['PHP_SELF']); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo.webp" type="image/x-icon"/>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/hoverzoom.css">
    <script src="https://kit.fontawesome.com/50f7da3bc4.js" crossorigin="anonymous"></script>
    <title>Puppy Pet Shop</title>
</head>
<body>
            <!-- HEADER -->
    <header>
        <section class="home">
            <div class="navigation">
                <img class="logo_nav" src="./assets/img/navigation.webp" alt="">
                <div class="top_bar">
                    <div class="top_bar-left">
                        <p>Chào mừng bạn đến với Puppy Pet Shop</p>
                        <p>Email: puppypet2u@gmail.com</p>
                    </div>
                    <div class="top_bar-right">
                       <div class="top_bar-right-l">
                            <i class="fa-solid fa-map-location-dot "></i>
                            <a href=""><span>Hệ thống cửa hàng</span></a>
                       </div>
                       <div class="top_bar-right-l">
                            <i class="fa-solid fa-user"></i>
                            <?php if(isset($_SESSION['username'])) { ?>
                                <ul class="top_bar-right-l-account"><span><?php echo $_SESSION['username']; ?></span>
                                        <li class="sign_in"><a href="user.php">Thông tin</a></li>
                                        <li><a href="logout.php">Đăng xuất</a></li>
                                </ul>
                            <?php } else { ?>
                                <ul class="top_bar-right-l-account"><span>Tài khoản</span>
                                        <li class="sign_in"><a href="login.php">Đăng nhập</a></li>
                                        <li><a href="register.php">Đăng ký</a></li>
                                    </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mid_header">
                <div class="logo_shop">
                    <img src="./assets/img/logo.webp" alt="">
                </div>

                <div class="search_header">
                    <form action="/search" class="input_gr" role="search">
                        <div class="collection-selector">
                            <div class="search_text"> 
                                Tất cả
                            </div>
                            <div class="search_info">
                                <div class="search_items">Thức ăn dành riêng cho...</div>
                                <div class="search_items">Giải pháp trị ve rận</div>
                                <div class="search_items">Sữa tắm Yu</div>
                                <div class="search_items">Sản phẩm yêu thích</div>
                                <div class="search_items">Xịt Khử Mùi Cho Mèo</div>
                                <div class="search_items">Tất cả</div>
                            </div>
                        </div>
                        <input type="text" placeholder="Tìm kiếm sản phẩm..." class="text-input" name="key">
                        <input type ="submit" class="btn-search" name="search" value="" >
                            <i class="fa-solid fa-magnifying-glass btn-search_ic"></i>
                        </input>

                    </form>
                </div>

                <div class="content_header-right">
                    <div class="contact_header header_right-ct">
                        <i class="fa-solid fa-phone"></i>
                        <div class="content_header-text">
                            <p>Gọi đặt hàng</p>
                            <p>0918985026</p>
                        </div>
                    </div>
        
                    <div class="cart_header header_right-ct">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <div class="content_header-text">
                            <p>Giỏ hàng</p>
                            <p>Sản phẩm</p>
                            <div class="cart_content">
                                <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
    </header>

    <!-- PAYMENT -->
    <section class="payment">
        <div class="container">
            <div class="cart_top-wrap">
                <div class="cart_top">
                    <div class="cart_top-cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
    
                    <div class="cart_top-cart">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
    
                    <div class="cart_top-cart">
                        <i class="fa-solid fa-money-check-dollar"></i>
                    </div>
                </div>
            </div>

            <div class="payment_cont">
                <div class="payment_cont-left">
                    <div class="payment_deliv">
                        <h4>Phương thức giao hàng</h4>
                        <div class="payment_select-method">
                            <input type="radio" name="payment_method-1">
                            <label for="">Giao hàng chuyển phát nhanh</label>
                        </div>
        
                        <div class="payment_select-method" >
                            <input type="radio" name="payment_method-1">
                            <label for="">Giao hàng hỏa tốc</label>
                        </div>
                    </div>
        
                    <div class="payment_select">
                        <h4> Phương thức thanh toán</h4>
                        <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                        <div class="payment_select-method">
                            <input type="radio" name="payment_method" id="credit_card">
                            <label for="credit_card">Thanh toán bằng thẻ tín dụng (OnePay)</label><br>
                            <img src="./assets/img/pay_visa.png" alt="">
                        </div>
                        <div class="payment_select-method">
                            <input type="radio" name="payment_method" id="atm_card">
                            <label for="atm_card">Thanh toán bằng thẻ ATM(OnePay)</label><br>
                            <img src="./assets/img/pay_atm.png" alt="">
                        </div>
        
                        <div class="payment_select-method">
                            <input type="radio" name="payment_method" id="cod">
                            <label for="cod">Thanh toán khi nhận hàng(COD)</label>
                        </div>
                        
                        <div class="payment_select-method">
                            <input type="radio" name="payment_method" id="momo">
                            <label for="momo">Thanh toán bằng MoMo</label><br>
                            <img src="./assets/img/pay_môm.jpg" alt="">
                        </div>
        
                    </div>
                </div>

                <div class="payment_cont-right">
                    <table class="payment_cont-right-table">
                        <tr>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                        </tr>

                        <?php
                                if(isset($_SESSION['username'])) {
                                    $username = $_SESSION['username'];
                                    $sql_info = "SELECT * FROM tbl_user WHERE user_username = '$username'";
                                    $get_info = $conn->query($sql_info);
                                    $info_user = $get_info->fetch_assoc();
                                    $user_id =  $info_user['user_id'];
                                    $sql_cart = "SELECT * FROM tbl_cart WHERE user_id ='$user_id' and cart_status = '0'";
                                    $get_cart = $conn->query($sql_cart);
                                    $total = 0;
                                    while($info_cart = $get_cart->fetch_assoc()) {
                                        // Loại bỏ các ký tự không phải số từ chuỗi
                                        $numericValue = preg_replace("/[^0-9]/", "", $info_cart['cart_total']);

                                        // Chuyển đổi giá trị thành số
                                        $numericValue = floatval($numericValue);

                                        $total = $total + $numericValue;
                                
                            ?>
                        <tr>
                            <td>
                                <p><?php echo $info_cart['cart_name'];?></p>
                            </td>
                            <td><?php echo $info_cart['cart_quantity'];?></td>
                        </tr>

                        <?php
                                    }
                                }
                        ?>

                        <tr>
                            <td>
                                <h4 style="color: #bb3107 ;">Thanh toán</h4>
                            </td>
                            <td style="color: #bb3107 ;"><?php echo number_format($_SESSION['all_total'], 0, ',', '.') . '₫'; ?></td>
                        </tr>
                    </table>

                    <div class="deli_select-btn payment_btn">
                        <a href="./delivery.php">
                            <i class="fa-solid fa-chevron-left"></i>
                            <span>Quay lại</span>
                        </a>
                        <button class="btn_apply">
                            Thanh Toán
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
                <!-- FOOTER --> 
<?php
    include "footer.php";
?>