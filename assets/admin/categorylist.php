<?php
    include "header.php";
    include "slider.php";
    include "class/category_class.php";
?>

<?php
    $category = new Category();
    $show_category = $category -> show_category($category);
?>

            <div class="admin-content_right">
                <div class="admin-content_right-category_list">
                    <h1>Danh sách danh mục</h1>
                    <table>
                        <thead> 
                            <tr>
                                <td><b>STT</b></td>
                                <td><b>ID</b></td>
                                <td><b>DANH MỤC</b></td>
                                <td><b>TUỲ BIẾN</b></td>
                            </tr>
                        </thead>
                        <?php
                            if ($show_category) {
                                $i = 0;
                                while ($result = $show_category -> fetch_assoc()) {
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['category_id'];?></td>
                            <td><?php echo $result['category_name'];?></td>
                            <td>
                                <a href="categoryedit.php?category_id=<?php echo $result['category_id'];?>">Sửa</a> |
                                <a href="categorydelete.php?category_id=<?php echo $result['category_id'];?>">Xóa</a>
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