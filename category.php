<?php
    include "header.php";
?>
                 <!-------- CATEGORY --------->
    <section class="category">
        <div class="container">
            <?php                               
                // Lấy category_id từ tham số truyền vào
                $category_id = isset($_GET['id']) ? $_GET['id'] : null;
                $sql_category_name = "SELECT category_name FROM tbl_category WHERE category_id = $category_id";
                $category_name = $conn->query($sql_category_name);
                $row_ct_name = $category_name->fetch_assoc();
            ?>
            <div class="category-top">
                <p>Trang Chủ</p> <span>/</span> <p style="color:#bb3107;"><?php echo mb_convert_case($row_ct_name['category_name'], MB_CASE_TITLE, "UTF-8"); ?></p>
            </div>

            <div class="header_nav-list-menu">
                <div class="header_nav-list-select non_bor">
                   <div class="title">
                        <span >DANH MỤC SẢN PHẨM</span>
                   </div>

                    <div class="menu_select none-ev">
                        <div class="menu_select-content">
                            <p><a href="index.php">Trang chủ</a></p>
                        </div>
                    </div>

                    <div class="menu_select">
                        <div class="menu_select-content">
                            <p><a href="service.php">Dịch Vụ</a></p>
                        </div>
                    </div>

                    <div class="menu_select">
                        <div class="menu_select-content">
                            <p><a href="category.php?quanly=category&id=4">Shop Chó Yêu</a></p>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>

                        <div class="menu_select-cart mn_ds-r">
                            <div class="menu_select-cart-content">
                                <p>Thức ăn cho chó</p>
                                
                            </div>

                            <div class="menu_select-cart-content">
                                <p>Sữa tắm cho chó</p>
                                
                            </div>

                            <div class="menu_select-cart-content">
                                <p>Quầy Lồng Chuồng Túi Xách</p>
                                
                            </div>

                            <div class="menu_select-cart-content">
                                <p>Y tế & Thuốc cho chó</p>
                                
                            </div>

                            <div class="menu_select-cart-content">
                                <p>Đồ chơi phụ kiện huấn luyện chó</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="menu_select">
                        <div class="menu_select-content">
                            <p><a href="category.php?quanly=category&id=5">Shop Mèo Yêu</a></p>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>

                        <div class="menu_select-cart mn_ds-r">
                            <div class="menu_select-cart-content">
                                <p>Thức ăn cho mèo</p>
                                
                            </div>

                            <div class="menu_select-cart-content">
                                <p>Khay cát - vệ sinh</p>
                                
                            </div>

                            <div class="menu_select-cart-content">
                                <p>Sữa tắm cho mèo</p>
                                
                            </div>

                            <div class="menu_select-cart-content">
                                <p>Y tế & Thuốc cho mèo</p>
                                
                            </div>

                            <div class="menu_select-cart-content">
                                <p>Đồ thưởng - đồ ăn vặt</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="menu_select">
                        <div class="menu_select-content">
                            <p><a href="news.php">Tin Tức Liên Quan</a></p>
                        </div>
                    </div>

                    <div class="menu_select">
                        <div class="menu_select-content">
                            <p><a href="category.php?quanly=category&id=7">Sản Phẩm</a></p>
                        </div>
                    </div>

                    <div class="menu_select">
                        <div class="menu_select-content">
                            <p><a href="category.php?quanly=category&id=8">Liên Hệ</a></p>
                        </div>
                    </div>

                    <div class="menu_bot">
                        <div class="title">
                            <span >GIÁ SẢN PHẨM</span>
                       </div>

                       <p><input type="checkbox" name="" id="">   Giá dưới 100.000đ</p>
                       <p><input type="checkbox" name="" id=""> 100.000đ - 200.000đ</p>
                       <p><input type="checkbox" name="" id=""> 200.000đ - 300.000đ</p>
                       <p><input type="checkbox" name="" id=""> 300.000đ - 1.000.000đ</p>
                       <p><input type="checkbox" name="" id=""> Giá trên 1.000.000đ</p>
                    </div>

                    <div class="menu_bot">
                        <div class="title">
                            <span >THƯƠNG HIỆU</span>
                       </div>

                       <p><input type="checkbox" name="" id=""> Alkin</p>
                       <p><input type="checkbox" name="" id=""> ANF</p>
                       <p><input type="checkbox" name="" id=""> AuPet</p>
                       <p><input type="checkbox" name="" id=""> Bayer</p>
                       <p><input type="checkbox" name="" id=""> Bowwow</p>
                    </div>

                    <div class="menu_bot">
                        <div class="title">
                            <span >KÍCH THƯỚC</span>
                       </div>

                       <div class="check_s">
                            <p><input type="checkbox" name="" id=""> XS</p>
                            <p><input type="checkbox" name="" id=""> S</p>
                            <p><input type="checkbox" name="" id=""> M</p>
                            <p><input type="checkbox" name="" id=""> L</p>
                            <p><input type="checkbox" name="" id=""> XL</p>
                       </div>
                    </div>

                    <div class="menu_bot">
                        <div class="title">
                            <span >MÀU SẮC</span>
                       </div>

                       <div class="check_s">
                            <p class="check_s-color"><input type="checkbox" name="" id="">
                                <i class="fa" style="background-color: #000000;"></i>
                            </p>
                            <p class="check_s-color"><input type="checkbox" name="" id="">
                                <i class="fa" style="background-color: red;" ></i>
                            </p>
                            <p class="check_s-color"><input type="checkbox" name="" id="">
                                <i class="fa" style="background-color: blue;" ></i>
                            </p>
                            <p class="check_s-color"><input type="checkbox" name="" id="">
                                <i class="fa" style="background-color: green;" ></i>
                            </p>
                            <p class="check_s-color"><input type="checkbox" name="" id="">
                                <i class="fa" style="background-color: pink;" ></i>
                            </p>
                            <p class="check_s-color"><input type="checkbox" name="" id="">
                                <i class="fa" style="background-color: yellow;" ></i>
                            </p>
                            <p class="check_s-color"><input type="checkbox" name="" id="">
                                <i class="fa" style="background-color: orange;" ></i>
                            </p>
                            <p class="check_s-color"><input type="checkbox" name="" id="">
                                <i class="fa" style="background-color: violet;" ></i>
                            </p>
                       </div>
                    </div>

                    <div class="sidebar">
                        <a href="">
                            <img src="./assets/img/banner_sidebar.webp" alt="">
                        </a>
                    </div>
                </div>
                
                <div class="header_nav-list-right">
                    <div class="ct_top">
                        <h4><?php echo $row_ct_name['category_name']; ?></h4>

                        <div class="ct_top-right">
                            <span>Sắp Xếp:</span>
                            <select name="arrange" id="">
                                <option value="">Thứ Tự</option>
                                <option value="">Mặc định</option>
                                <option value="">A -> Z</option>
                                <option value="">Z -> A</option>
                                <option value="">Giá tăng dần</option>
                                <option value="">Giá giảm dần</option>
                                <option value="">Hàng mới nhất</option>
                                <option value="">Hàng cũ nhất</option>
                            </select>
                        </div>
                    </div>

                    <div class="list_items">

                        <?php
                            if ($category_id == 7 || $category_id == null) {
                            $sql_sanpham = "SELECT * FROM tbl_product GROUP BY product_name DESC LIMIT 20";
                            $product = $conn->query($sql_sanpham);
                            
                            while ($row_product = $product->fetch_assoc()) {
                                
                        ?>
                        <div class="list_item">
                            <div class="hover_zoom">
                                <div class="overlay"></div>
                                <img src="./assets/img/product/<?php echo $row_product['product_img'];?>" alt="">
                            </div>
                            <a href="./product.php?product_id=<?php echo $row_product['product_id'];?>"><p><?php echo $row_product['product_name']; ?></p></a>
                            <h4><?php echo number_format($row_product['product_price'], 0, ',', '.'). '₫'; ?></h4>
                        </div>
    
                        <?php
                                }
                            } else if ($category_id !== null){
                                // Thực hiện truy vấn SQL để lấy sản phẩm thuộc danh mục có category_id
                                $sql_sanpham = "SELECT * FROM tbl_product WHERE category_id = '$category_id' ";
                                $product = $conn->query($sql_sanpham);
                                
                                // Hiển thị sản phẩm
                                while ($row_product = $product->fetch_assoc()) {
                        ?>
                                    <div class="list_item">
                                        <div class="hover_zoom">
                                            <div class="overlay"></div>
                                            <img src="./assets/img/product/<?php echo $row_product['product_img'];?>" alt="">
                                        </div>
                                        <a href="./product.php?product_id=<?php echo $row_product['product_id'];?>"><p><?php echo $row_product['product_name']; ?></p></a>
                                        <h4><?php echo number_format($row_product['product_price'], 0, ',', '.'). '₫'; ?></h4>
                                    </div>
                        <?php
                                }
                            }
                        ?>

                       
                    </div>
                </div>
            </div>

            <div class="num_pages">
                <button class="num_page active">1</button>
                <button class="num_page">2</button>
                <button class="num_page">3</button>
                <button class="num_page">...</button>
                <button class="num_page">21</button>
                <button class="num_page">></button>
            </div>
        </div>
    </section>

<?php
    include "footer.php";
?>