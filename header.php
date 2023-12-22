<?php
    session_start();
<<<<<<< HEAD
    include 'config.php';
=======
    include './config.php';
>>>>>>> 7fcad9926185ba52545444f4f210897ccca0cae7
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>

<?php
    $sql = "SELECT * FROM tbl_category ORDER BY category_id";
    $category = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" data-current-page="<?php echo basename($_SERVER['PHP_SELF']); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/hoverzoom.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://kit.fontawesome.com/50f7da3bc4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Puppy Pet Shop</title>
</head>

<body>
    <!-- HEADER  -->
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
                        <input type="search" placeholder="Tìm kiếm sản phẩm..." class="text-input">
                        <button type ="button" class="btn-search" src="#">
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
                            <a href="./cart.php">
                                <p>Giỏ hàng</p>
                                <p>Sản phẩm</p>
                            </a>
<<<<<<< HEAD
                            <!-- <div class="cart_content">
                                <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                            </div> -->
=======
                            <div class="cart_content">
                                <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                            </div>
>>>>>>> 7fcad9926185ba52545444f4f210897ccca0cae7
                        </div> 
                    </div>
                </div>
            </div>
    
            <div class="header_nav">
                <div class="header_nav-menu">
                    <div class="header_nav-menu-t">
                        <i class="fa-solid fa-bars"></i>
                        DANH MỤC SẢN PHẨM
                    </div>
    
                    <div class="header_nav-list">
                        <p><a href="./index.php">TRANG CHỦ</a></p>
                        <?php
                            $customPaths = [
                                3 => './service.php',
                                6 => './news.php',
                                8 => './'
                            ];
                            while ($row = $category->fetch_assoc()) {
                                $category_id = $row['category_id'];
                                $path = isset($customPaths[$category_id]) ? $customPaths[$category_id] : './category.php?quanly=category&id=' . $category_id;
                        ?>
                        <div class="menu_select" onmouseover="showBrandInfo(<?php echo $category_id; ?>)">
                        <p>
                            <a href="<?php echo $path; ?>">
                                <?php echo $row['category_name']; ?>
                            </a>
                            <?php
                            // Kiểm tra xem có dữ liệu brand hay không
                            $sqlBrand = "SELECT * FROM tbl_brand WHERE category_id = $category_id";
                            $resultBrand = $conn->query($sqlBrand);

                            if ($resultBrand->num_rows > 0) {
                            ?>
                                <i class="fa-solid fa-angle-down"></i>
                            <?php
                            }
                            ?>
                        </p>

                            <div class="menu_select-cart mn_ds-d" id="brand-info-<?php echo $category_id; ?>">
                                <!-- Thông tin về thương hiệu sẽ được hiển thị ở đây -->
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>

                </div>
            </div>
        </section>
    </header>