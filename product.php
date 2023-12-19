<?php
    include "header.php";
?>


<!-- PRODUCT -->
<section class="product">
    <div class="container">
        <?php
            if(isset($_GET["product_id"])) {
                $product_id = $_GET["product_id"];
                $sql_product_desc = "SELECT tbl_category.category_name, tbl_product.* FROM tbl_product
                    JOIN tbl_category ON tbl_product.category_id = tbl_category.category_id
                    WHERE tbl_product.product_id = '$product_id'";

                $product_desc = $conn->query($sql_product_desc);
                if ($product_desc && mysqli_num_rows($product_desc) > 0) {
                    $row_product_desc = $product_desc->fetch_assoc();
        ?>
        <div class="product-top">
            <p>Trang Chủ</p> <span>/</span><p><?php echo mb_convert_case($row_product_desc['category_name'], MB_CASE_TITLE, "UTF-8");?></p> <span>/</span> <p style="color:#bb3107;"><?php echo $row_product_desc['product_name'];?></p>
        </div>

        <div class="product_content">
            <div class="product_content-left">
                <form action="cart.php?idsp=<?php echo $row_product_desc['product_id'];?>" method="post" class="product_content-left-top">
                    <div class="product_content-left_img">
                        <div class="product_content-left_img-big">
                            <img id= "big_Img" src="./assets/img/product/<?php echo $row_product_desc['product_img'];?>" alt="">
                        </div>
                        <div class="product_content-left_img-small">
                            <?php
                                if (!empty($product_id)) {
                                    $query_img_des = "SELECT * FROM tbl_product_img_des WHERE product_id = '$product_id'";
                                    $product_img_des = $conn->query($query_img_des);

                                    while ($row_product_img = $product_img_des->fetch_assoc()) {
                                        
                            ?>
                                    <img class="small_Img" src="./assets/img/product/<?php echo $row_product_img['product_img_des'];?>" alt="">

                            <?php
                                    }

                                }
                            ?>
                    
                        </div>
                    </div>
                                
                    <div class="product_content-prd">
                        <div class="product_content-prd-top">
                            <h1><?php echo $row_product_desc['product_name'];?></h1>
                            <div class="prd_ct">
                                <p>Thương hiệu: </p> <span> Đang cập nhật</span> <h5>|</h5> <p> Tình trạng: </p> <span> Còn hàng</span>
                            </div>
                            <h3><?php echo number_format($row_product_desc['product_price'], 0, ',', '.'). '₫';?></h3>
                        </div>

                        <div class="product_content-prd-btm">
                            <p> Puppy Pet Shop hướng tới lợi ích tối ưu cho khách hàng qua việc đem tới những sản phẩm có chất lượng tốt nhất với mức giá hợp lý nhất. Với phương châm tạo sự tiện lợi và thoải mái nhất cho khách hàng, từ việc tư vấn chi tiết chủng loại, giá cả cho khách hàng đến việc giao hàng và chăm sóc khách hàng, Puppy Pet Shop luôn quan tâm để ý một cách chu đáo nhất.</p>

                            <div class="product_content-prd-btm-buy">
                                <div class="input_number_product">
                                    <button class="decrement">-</button>
                                    <input type="text" value="1" class="count" name="product_count">
                                    <button class="increment">+</button>
                                </div>

                                <input class="buy_product btn_buy-pdt" type="submit" name="product_add" value = "Mua Hàng">    
                                <i class="fa-solid fa-cart-shopping prdt-item"></i>
                            </div>
                            <h4>Gọi ngay 0918985026 để có được giá tốt nhất!</h4>
                        </div>
                    </div>
                </form>

                <div class="product_content-prd-bottom">
                    <div class="product-tab">
                        <ul class="tabs-title">
                            <li class="tab-link current tab_info">THÔNG TIN SẢN PHẨM</li>
                            <li class="tab-link tab_custom">TAB TÙY CHỈNH</li>
                            <li class="tab-link tab_evaluate">ĐÁNH GIÁ SẢN PHẨM</li>
                        </ul>
                    </div>

                    <div class="content-tab product_info">
                        <?php echo $row_product_desc['product_des'];?>
                    </div>

                    <?php
                            }
                        }
                    ?>
                    <div class="content-tab product_custom">
                        <h4>Chưa có tùy chỉnh</h4>
                        
                    </div>
                    <div class="content-tab product_evaluate">
                        <h4>Chưa có đánh giá</h4>
                    </div>
                </div>
            </div>

            <div class="product_content-right">
                <div class="content_right-item">
                    <img src="./assets/img/productdetail-icon5.webp" alt="">
                    <div class="content_right-pr">
                        <h4>Giao hàng nhanh chóng</h4>
                        <p>Chỉ trong vòng 24h đồng hồ</p>
                    </div>
                </div>

                <div class="content_right-item">
                    <img src="./assets/img/productdetail-icon4.webp" alt="">
                    <div class="content_right-pr">
                        <h4>Sản phẩm mới</h4>
                        <p>Sản phẩm mới 100%</p>
                    </div>
                </div>

                <div class="content_right-item">
                    <img src="./assets/img/productdetail-icon3.webp" alt="">
                    <div class="content_right-pr">
                        <h4>Đổi trả cực kì dễ dàng</h4>
                        <p>Đổi trả trong 5 ngày đầu tiên</p>
                    </div>
                </div>

                <div class="content_right-item">
                    <img src="./assets/img/productdetail-icon2.webp" alt="">
                    <div class="content_right-pr">
                        <h4>Mua hàng tiết kiệm</h4>
                        <p>Tiết kiệm hơn từ 10% - 30%</p>
                    </div>
                </div>

                <div class="content_right-item">
                    <img src="./assets/img/productdetail-icon1.webp" alt="">
                    <div class="content_right-pr">
                        <h4>Hotline mua hàng:</h4>
                        <p>0918985026</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="list-items product_other">
            <h1>Sản phẩm cùng loại</h1>
            <div class="product_content-other">
                <div class="list_item pdt_oth">
                    <div class="hover_zoom">
                        <div class="overlay"></div>
                        <img src="./assets/img/list_it1.webp" alt="">
                    </div>
                    <a href=""><p> Dụng cụ gắp phân thú cưng</p></a>
                    <h4>45.000₫</h4>
                </div>

                <div class="list_item pdt_oth">
                    <div class="hover_zoom">
                        <div class="overlay"></div>
                        <img src="./assets/img/shopee-0ed4f5fe-46a4-4dff-89cf-e5deb3e0163a.webp " alt="">
                    </div>
                    <a href=""><p>Dầu cá hồi Q8 150ml</p></a>
                    <h4>140.000₫</h4>
                </div>

                <div class="list_item pdt_oth">
                    <div class="hover_zoom">
                        <div class="overlay"></div>
                        <img src="./assets/img/web-b727a219-c00b-4742-afc7-f110b05aa681.webp" alt="">
                    </div>
                    <a href=""><p>Thức ăn Kitchen Flavor cho mèo vị CÁ BIỂN VÀ RAU CỦ QUẢ</p></a>
                    <h4>250.000₫</h4>
                </div>

                <div class="list_item pdt_oth">
                    <div class="hover_zoom">
                        <div class="overlay"></div>
                        <img src="./assets/img/wweb-ec7efa5e-9c82-4cf8-9c7c-a2e6d94c425f.webp" alt="">
                    </div>
                    <a href=""><p>Thức ăn Kitchen Flavor cho chó - Vị CÁ HỒI VÀ RAU CỦ QUẢ</p></a>
                    <h4>235.000₫</h4>
                </div>

                <div class="list_item pdt_oth">
                    <div class="hover_zoom">
                        <div class="overlay"></div>
                        <img src="./assets/img/web-c437fe71-81b6-4934-9d38-b56ee2139115.webp" alt="">
                    </div>
                    <a href=""><p>Cần câu cán dài và lông vũ, con sâu, chuồn chuồn,con cá</p></a>
                    <h4>50.000₫</h4>
                </div>
                
                <div class="list_item pdt_oth">
                    <div class="hover_zoom">
                        <div class="overlay"></div>
                        <img src="./assets/img/web-5a0b540d-6776-4ad7-bd00-b87963f17450.webp" alt="">
                    </div>
                    <a href=""><p>Thạch Pudding sữa dê chó chó, mèo</p></a>
                    <h4>65.000₫</h4>
                </div>   
            </div>
        </div>
    </div>
</section>

    <!-- FOOTER -->
<?php
    include "footer.php";   
?>