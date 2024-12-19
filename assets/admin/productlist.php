<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
?>

<?php
    $product = new Product();
    $show_product = $product -> show_product();
?>

            <div class="admin-content_right">
                <div class="admin-content_right-category_list admin-content_right-product_list">
                    <h1>Danh sách sản phẩm </h1>
                    <table>
                        <thead>
                            <tr>
                                <td><b>STT</b></td>
                                <td><b>ID</b></td>
                                <td><b>DANH MỤC</b></td>
                                <td><b>LOẠI SẢN PHẨM</b></td>
                                <td><b>TÊN SẢN PHẨM</b></td>
                                <td><b>GIÁ SẢN PHẨM</b></td>
                                <td><b>GIÁ KHUYẾN MÃI</b></td>
                                <td><b>MÔ TẢ</b></td>
                                <!-- <td><b>ẢNh SẢN PHẨM</b></td>-->
                                <td><b>ẢNH CHI TIẾT</b></td>
                                <td><b>TUỲ BIẾN</b></td>
                            </tr>
                        </thead>
                        
                        <?php
                            if ($show_product) {
                                $i = 0;
                                while ($result = $show_product -> fetch_assoc()) {
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['product_id'];?></td>
                            <td><?php echo $result['category_id'];?></td>
                            <td><?php echo $result['brand_id'];?></td>
                            <td><?php echo $result['product_name'];?></td>
                            <td><?php echo $result['product_price'];?></td>
                            <td><?php echo $result['product_price_new'];?></td>
                            <td><?php echo $result['product_des'];?></td>
                            <td><img src="uploads/<?php echo $result['product_img'];?>" alt=""></td>
                            <!-- <td><?php echo $result['product_img_des'];?></td> -->
                            <td>
                                <a href="productedit.php?product_id=<?php echo $result['product_id'];?>">Sửa</a><br><br>
                                <a href="productdelete.php?product_id=<?php echo $result['product_id'];?>">Xóa</a>
                            </td>
                        </tr>

                        <?php
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>