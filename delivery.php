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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/toastmess.css">
    <link rel="stylesheet" href="./assets/css/hoverzoom.css">
    <script src="https://kit.fontawesome.com/50f7da3bc4.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/toastmess.js"></script>
    <title>Puppy Pets Shop</title>
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
                    <a href="./index.php"><img src="./assets/img/logo.webp" alt=""></a> 
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
                            <!-- <div class="cart_content">
                                <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                            </div> -->
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


            <form action="order_product.php" method="post" class="delivery_content">
                <div class="info_client">
                    <h2>Thông tin mua hàng</h2>
                    <?php
                        if(isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            $sql_info = "SELECT * FROM tbl_user WHERE user_username = '$username'";
                            $get_info = $conn->query($sql_info);
                            $info_user = $get_info->fetch_assoc();
                            $user_id =  $info_user['user_id'];

                           if(isset($_SESSION['cart'])){
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $cart_name = $value['productname'];
                                    $cart_img = $value['productimg'];
                                    $gia = $value['productprice'];
                                    $soluong = $value['soluong'];
                                    $thanhtien = number_format($value['productprice'] * $value['soluong']) ;
                                    $sql_insetcart = "INSERT INTO tbl_cart (user_id, cart_name, cart_img, cart_price, cart_quantity, cart_total) 
                                                        VALUES ('$user_id','$cart_name', '$cart_img', '$gia','$soluong','$thanhtien')";
                                    $insert_cart = $conn->query($sql_insetcart);
                                }
                           }
                            unset($_SESSION['cart']);
                        }
                    ?>
                    <div class="field__input-wrapper">
                        <label for="email">Email:</label>
                        <input type="email" required id="email" class="field__input-wrapper-input"  name="txtemail"
                            <?php echo empty($info_user['user_name']) ? 'placeholder="Nhập Email..."' : 'value="' . $info_user['user_email'] . '"'; ?>
                        >
                    </div>
                    <div class="field__input-wrapper">
                        <label for="fullname">Họ và tên:</label>
                        <input type="text" required id="fullname" class="field__input-wrapper-input"  name="txtfullname"
                            <?php echo empty($info_user['user_name']) ? 'placeholder="Nhập họ tên..."' : 'value="' . $info_user['user_name'] . '"'; ?>
                        >
                    </div>
                    <div class="field__input-wrapper">
                        <label for="phone">SDT:</label>
                        <input type="tel" id="phone" required class="field__input-wrapper-input"  name="txtphone"
                            <?php echo empty($info_user['user_name']) ? 'placeholder="Nhập Số điện thoại..."' : 'value="' . $info_user['user_sdt'] . '"'; ?>
                        >
                    </div>
                    <div class="field__input-wrapper">
                        <label for="city">Tỉnh thành:</label>
                        <input type="text" id="city" class="field__input-wrapper-input" required name="txtcity"
                        <?php echo empty($info_user['user_name']) ? 'placeholder="Nhập Thành phố..."' : 'value="' . $info_user['user_address'] . '"'; ?>
                        >
                    </div>
                    <div class="field__input-wrapper">
                        <label for="district">Quận Huyện:</label>
                        <input type="text" id="district"  name="txtdistrict" required placeholder="Nhập quận huyện..." class="field__input-wrapper-input">
                    </div>
                    <div class="field__input-wrapper">
                        <label for="ward">Phường Xã:</label>
                        <input type="text" id="ward"  name="txtward" required placeholder="Nhập phường xã..." class="field__input-wrapper-input">
                    </div>
                    <div class="field__input-wrapper">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" id="address"  name="txtaddress" required class="field__input-wrapper-input" placeholder="Nhập Địa chỉ...">
                    </div>

                    <div class="field__input-wrapper">
                        <label for="payment_method">Thanh toán:</label>
                        <select id="payment_method" class="field__input-wrapper-input"  name="txtpayment_method">
                            <option value="cod">Thanh toán khi nhận hàng(COD)</option>
                            <option value="online" disabled>Thanh toán online</option>
                        </select>
                    </div>

                    <div class="field__input-note">
                        <label for="note" class="field__label"> </label>
                        <textarea name="txtnote" id="note" class="field__input" data-bind="note" style="height: 70px;" placeholder="Ghi chú"></textarea>
                    </div>
                </div>
                
                <div id="toast">
       
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

                            <?php
                                if(isset($_SESSION['username'])) {
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
                                <td>0%</td>
                                <td><?php echo $info_cart['cart_quantity'];?></td>
                                <td><?php echo $info_cart['cart_total']. '₫';?></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>  

                            <tr>
                                <td>
                                    <p>Tổng</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td><?php echo number_format($total, 0, ',', '.') . '₫'; ?></td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <h4>Phí vận chuyển</h4>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php
                                        $ship = 0;
                                        if($total >= 150000) {
                                            echo number_format($ship, 0, ',', '.') . '₫'; 
                                        } else {
                                            $ship = 30000;
                                            echo number_format($ship, 0, ',', '.') . '₫'; 
                                        }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h4>Thuế VAT</h4>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php
                                        $vat = ($total / 100) * 5;
                                        echo number_format($vat, 0, ',', '.') . '₫'; 
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Tồng tiền hàng</h4>
                                </td>
                                <td></td>
                                <td></td>
                                <td id="all_total"  >
                                    <?php
                                        $all = $total + $vat + $ship;
                                        $_SESSION['all_total'] = $all;
                                        echo number_format($all, 0, ',', '.') . '₫'; 
                                    ?>
                                </td>
                            </tr>
                        </table>

                        <div class="input_sale">
                            <input type="text" placeholder="Nhập mã giảm giá">
                            <button class="btn_apply" ame="apply_sale" disabled>Áp dụng</button>
                        </div>
                    </div>

                    <div class="deli_select">
                        <h1 name="txtall_total">                                   
                            <?php
                                echo number_format($all, 0, ',', '.') . '₫'; 
                            ?>
                            <input type="hidden" name="txtall_total" value="<?php echo $all; ?>">
                        </h1>

                        <div class="deli_select-btn">
                            <a href="./cart.php">
                                <i class="fa-solid fa-chevron-left"></i>
                                <span>Quay về giỏ hàng</span>
                            </a>
                            <button class="place_order-btn btn_apply" name="create_order" type="create_order" value="ĐẶT HÀNG">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
                <!-- FOOTER --> 
<?php
    include "footer.php";
?>