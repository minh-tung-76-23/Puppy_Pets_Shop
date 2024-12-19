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
                    <a href="./index.php">
                        <img src="./assets/img/logo.webp" alt="">
                    </a>
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
            <!-- CART -->
    <section class="cart">
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

            <div class="cart_mid">
                <div class="cart-content">
                    <!-- //Them san pham vao gio hang -->
                    <?php
                        if (isset($_POST['product_add'])) {
                            // session_destroy();
                            $id = $_GET['idsp'];
                            $product_count = $_POST['product_count'];
                            $sql_pdt = "SELECT * FROM tbl_product WHERE product_id = $id";
                            $product_add = $conn->query($sql_pdt);
                            $row_product_add = $product_add->fetch_assoc();
                            if ($row_product_add) {
                                $new_product = array(
                                    'productname' => $row_product_add['product_name'],
                                    'id' => $id,
                                    'soluong' => $product_count,
                                    'productprice' => $row_product_add['product_price'],
                                    'productimg' => $row_product_add['product_img'],
                                    'productid' => $row_product_add['product_id']
                                );

                                $product_it = array(); // Khởi tạo mảng

                                // Kiểm tra sự tồn tại
                                if (isset($_SESSION['cart'])) {
                                    $found = false;
                                    foreach ($_SESSION['cart'] as $cart_item) {
                                        //Neu san pham da co
                                        if ($cart_item['id'] == $id) {
                                            $product_it[] = array(
                                                'productname' => $cart_item['productname'],
                                                'id' => $cart_item['id'],
                                                'soluong' => $cart_item['soluong'] + $product_count,
                                                'productprice' => $cart_item['productprice'],
                                                'productimg' => $cart_item['productimg'],
                                                'productid' => $cart_item['productid']
                                            );
                                            $found = true;
                                        } else {
                                            //chua co san pham
                                            $product_it[] = array(
                                                'productname' => $cart_item['productname'],
                                                'id' => $cart_item['id'],
                                                'soluong' => $cart_item['soluong'],
                                                'productprice' => $cart_item['productprice'],
                                                'productimg' => $cart_item['productimg'],
                                                'productid' => $cart_item['productid']
                                            );
                                        }
                                    }
                                    if ($found == false) {
                                        $_SESSION['cart'] = array_merge($product_it, array($new_product));
                                    } else {
                                        $_SESSION['cart'] = $product_it;
                                    }
                                } else {
                                    $_SESSION['cart'] = array($new_product);
                                }
                            }
                            // print_r($_SESSION['cart']);
                        }
                    ?>

                    <!-- Thêm bớt số lượng sản phẩm -->
                   <?php
                        if(isset($_GET['increment'])) {
                            $id_incr = $_GET['increment'];
                            foreach($_SESSION['cart'] as $cart_item) {
                                if ($cart_item['id'] != $id_incr) {
                                    $product_it[] = array(
                                        'productname' => $cart_item['productname'],
                                        'id' => $cart_item['id'],
                                        'soluong' => $cart_item['soluong'],
                                        'productprice' => $cart_item['productprice'],
                                        'productimg' => $cart_item['productimg'],
                                        'productid' => $cart_item['productid']
                                    );

                                    $_SESSION['cart'] = $product_it;
                                } else {
                                    $increasing = $cart_item['soluong'] + 1;
                                    $product_it[] = array(
                                        'productname' => $cart_item['productname'],
                                        'id' => $cart_item['id'],
                                        'soluong' => $increasing ,
                                        'productprice' => $cart_item['productprice'],
                                        'productimg' => $cart_item['productimg'],
                                        'productid' => $cart_item['productid']
                                    );
                                }
                                $_SESSION['cart'] = $product_it;
                            }
                        }

                        if(isset($_GET['decrement'])) {
                            $id_der = $_GET['decrement'];
                            foreach($_SESSION['cart'] as $cart_item) {
                                if ($cart_item['id'] != $id_der) {
                                    $product_it[] = array(
                                        'productname' => $cart_item['productname'],
                                        'id' => $cart_item['id'],
                                        'soluong' => $cart_item['soluong'],
                                        'productprice' => $cart_item['productprice'],
                                        'productimg' => $cart_item['productimg'],
                                        'productid' => $cart_item['productid']
                                    );

                                    $_SESSION['cart'] = $product_it;
                                } else {
                                    $decreasing = $cart_item['soluong'] - 1;
                                    if ($cart_item['soluong'] <= 1) {
                                        $product_it[] = array(
                                            'productname' => $cart_item['productname'],
                                            'id' => $cart_item['id'],
                                            'soluong' => $cart_item['soluong'],
                                            'productprice' => $cart_item['productprice'],
                                            'productimg' => $cart_item['productimg'],
                                            'productid' => $cart_item['productid']
                                        );
                                    } else {
                                        $product_it[] = array(
                                            'productname' => $cart_item['productname'],
                                            'id' => $cart_item['id'],
                                            'soluong' => $decreasing,
                                            'productprice' => $cart_item['productprice'],
                                            'productimg' => $cart_item['productimg'],
                                            'productid' => $cart_item['productid']
                                        );
                                    }
                                }
                                $_SESSION['cart'] = $product_it;
                            }
                        }
                   ?>

                    <div class="cart-content_left">
                        <table>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Đơn Giá </th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>

                            <?php
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    foreach($_SESSION['cart'] as $cart_item) {

                            ?>
                            <tr>
                                <td>
                                    <img src="./assets/img/product/<?php echo $cart_item['productimg']?>" alt="">
                                </td>
                                <td>
                                    <p><?php echo $cart_item['productname']?></p>
                                    <span><a href="delete_product.php?id=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-xmark"></i>Xoá</a></span>
                                </td>
                                <td><?php echo number_format($cart_item['productprice'], 0, ',', '.') . '₫'; ?></td>
                                <td>
                                    <a href="./cart.php?decrement=<?php echo $cart_item['id']?>">-</a>
                                    <?php echo $cart_item['soluong']?>
                                    <a href="./cart.php?increment=<?php echo $cart_item['id']?>">+</a>
                                </td>
                                <td><?php echo number_format($cart_item['productprice'] * $cart_item['soluong'], 0, ',', '.') . '₫'; ?></td>
                            </tr>
                            <?php
                                    }
                                } else {        
                            ?>
                            <!-- <tr>
                                <td>
                                    <img src="./assets/img/product/<?php echo $cart_item['productimg']?>" alt="">
                                </td>
                                <td>
                                    <p><?php echo $cart_item['productname']?></p>
                                    <span><a href="delete_product.php?id=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-xmark"></i>Xoá</a></span>
                                </td>
                                <td><?php echo number_format($cart_item['productprice'], 0, ',', '.') . '₫'; ?></td>
                                <td>
                                    <a href="./cart.php?decrement=<?php echo $cart_item['id']?>">-</a>
                                    <?php echo $cart_item['soluong']?>
                                    <a href="./cart.php?increment=<?php echo $cart_item['id']?>">+</a>
                                </td>
                                <td><?php echo number_format($cart_item['productprice'] * $cart_item['soluong'], 0, ',', '.') . '₫'; ?></td>
                            </tr> -->
                            <?php        
                                }
                            ?>
                            
                        </table>
                    </div>

                    <div class="cart-content_right">

                        <?php
                            $totalQuantity = 0;
                            $totalAmount = 0;

                            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                foreach($_SESSION['cart'] as $cart_item) {
                                    $totalQuantity += $cart_item['soluong'];
                                    $totalAmount += $cart_item['productprice'] * $cart_item['soluong'];
                                }
                            }
                        ?>
                        
                        <table>
                            <tr>
                                <th colspan="2">Tổng tiền giỏ hàng</th>
                            </tr>
                            <tr>
                                <td>Tổng Sản Phẩm</td>
                                <td><?php echo $totalQuantity; ?></td>
                            </tr>
                            <tr>
                                <td>Tổng Tiền Hàng</td>
                                <td><?php echo number_format($totalAmount, 0, ',', '.') . '₫'; ?></td>
                            </tr>
                            <tr>
                                <td>Thành Tiền</td>
                                <td><?php echo number_format($totalAmount, 0, ',', '.') . '₫'; ?></td>
                            </tr>
                            <tr>
                                <td>Phí vận chuyển</td>
                                <?php if($totalAmount > 150000) {?>
                                    <td>0₫</td>
                                <?php } else {?>
                                    <td>35.000₫</td>
                                <?php }?>

                            </tr>
                        </table>

                        <div class="cart-content_right-text">
                            <p>Free ship cho những đơn hàng có giá trị trên 150k!</p>
                        </div>

                        <?php if(isset($_SESSION['username'])) { ?>

                            <div class="cart-content_right-btn">
                                <button class="return_page">Tiếp Tục Mua Sắm</button>
                                <button class="next_page">THANH TOÁN</button>
                            </div>

                            <div class="cart-content_right-login">
                                    <p></p>
                            </div>
                        <?php } else {?>
                            <div class="cart-content_right-login">
                                <p>TÀI KHOẢN PUPPY PETS SHOP</p>
                                <p>Hãy <a href="login.php">Đăng nhập</a> để nhận nhiều ưu đãi hơn!</p> 
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

            <!-- FOOTER -->   
<?php
    include "footer.php";
?>