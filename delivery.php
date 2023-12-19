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
                                        <li class="sign_in"><a href="#">Thông tin</a></li>
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
                        <input type="search" placeholder="Tìm kiếm sản phẩm..." class="text-input">
                        <button class="btn-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
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

                <!-- DELIVERY --> 
    <section class="delivery">
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

            <div class="delivery_content">
                <div class="info_client">
                    <h2>Thông tin mua hàng</h2>
                    <div class="field__input-wrapper">
                        <label for="email">Email:</label>
                        <input type="email" id="email" placeholder="Nhập email của bạn..." class="field__input-wrapper-input">
                    </div>
                    <div class="field__input-wrapper">
                        <label for="fullname">Họ và tên:</label>
                        <input type="text" id="fullname" placeholder="Nhập Họ tên..." class="field__input-wrapper-input">
                    </div>
                    <div class="field__input-wrapper">
                        <label for="phone">SDT:</label>
                        <input type="tel" id="phone" placeholder="Nhập Số điện thoại..." class="field__input-wrapper-input">
                    </div>
                    <div class="field__input-wrapper">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" id="address" placeholder="Nhập Địa chỉ..." class="field__input-wrapper-input">
                    </div>
                    <div class="field__input-wrapper">
                        <label for="city">Tỉnh thành:</label>
                        <input type="text" id="city" placeholder="Nhập thành phố..." class="field__input-wrapper-input">
                    </div>
                    <div class="field__input-wrapper">
                        <label for="district">Quận Huyện:</label>
                        <input type="text" id="district" placeholder="Nhập quận huyện..." class="field__input-wrapper-input">
                    </div>
                    <div class="field__input-wrapper">
                        <label for="ward">Phường Xã:</label>
                        <input type="text" id="ward" placeholder="Nhập phường xã..." class="field__input-wrapper-input">
                    </div>

                    <div class="field__input-note">
                        <label for="note" class="field__label"> </label>
                        <textarea name="note" id="note" class="field__input" data-bind="note" style="height: 70px;" placeholder="Ghi chú"></textarea>
                    </div>
                </div>
                

                <div class="info_order">
                    <h2>Đơn hàng</h2>
                    <div class="info_order-table">
                        <table>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Giảm Giá </th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                            <tr>
                                <td>
                                    <p>Balo Vải Vận Chuyển Chó Mèo Big Pet 40*37*25cm</p>
                                </td>
                                <td>20%</td>
                                <td>1</td>
                                <td>304.000₫</td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Balo Vải Vận Chuyển Chó Mèo Big Pet 40*37*25cm</p>
                                </td>
                                <td>20%</td>
                                <td>1</td>
                                <td>304.000₫</td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Tổng</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td>304.000₫</td>
                            </tr>

                            <tr>
                                <td>
                                    <h4>Thuế VAT</h4>
                                </td>
                                <td></td>
                                <td></td>
                                <td>50.000₫</td>
                            </tr>

                            <tr>
                                <td>
                                    <h4>Tồng tiền hàng</h4>
                                </td>
                                <td></td>
                                <td></td>
                                <td>658.000₫</td>
                            </tr>
                        </table>

                        <div class="input_sale">
                            <input type="text" placeholder="Nhập mã giảm giá">
                            <button class="btn_apply">Áp dụng</button>
                        </div>
                    </div>

                    <div class="deli_select">
                        <h1>658.000₫</h1>

                        <div class="deli_select-btn">
                            <a href="./cart.php">
                                <i class="fa-solid fa-chevron-left"></i>
                                <span>Quay về giỏ hàng</span>
                            </a>
                            <button class="btn_apply place_order-btn">
                                ĐẶT HÀNG
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
                <!-- FOOTER --> 
<?php
    include "footer.php";
?>