<?php
    include "header.php";
    include "slider.php";
    include "class/brand_class.php";
?>

<?php
    $brand = new Brand();
    $show_brand = $brand -> show_brand($brand);
?>

            <div class="admin-content_right">
                <div class="admin-content_right-category_list">
                    <h1>Danh sách loại sản phẩm </h1>
                    <table>
                        <thead>
                            <tr>
                                <td><b>STT</b></td>
                                <td><b>ID</b></td>
                                <td><b>CATEGORY_ID</b></td>
                                <td><b>DANH MỤC</b></td>
                                <td><b>LOẠI SẢN PHẨM</b></td>
                                <td><b>TUỲ BIẾN</b></td>
                            </tr>
                        </thead>
                        <?php
                            if ($show_brand) {
                                $i = 0;
                                while ($result = $show_brand -> fetch_assoc()) {
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['brand_id'];?></td>
                            <td><?php echo $result['category_id'];?></td>
                            <td><?php echo $result['category_name'];?></td>
                            <td><?php echo $result['brand_name'];?></td>
                            <td>
                                <a href="brandedit.php?brand_id=<?php echo $result['brand_id'];?>">Sửa</a> |
                                <a href="branddelete.php?brand_id=<?php echo $result['brand_id'];?>">Xóa</a>
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