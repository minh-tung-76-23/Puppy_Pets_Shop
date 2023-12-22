<?php
    include "header.php";
    include "slider.php";
    include "class/brand_class.php";
?>

<?php
    $brand = new Brand();
    $brand_id = $_GET["brand_id"];

    $get_brand = $brand -> get_brand($brand_id);

    if ($get_brand) {
        $resultA = $get_brand -> fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category_id = $_POST['category_id'];
        $brand_name = $_POST['brand_name'];
        $update_brand = $brand -> update_brand($brand_id, $category_id, $brand_name);
    }
?>

<div class="admin-content_right">
            <div class="admin-content_right-category_add">
                <h1>Sửa loại sản phẩm</h1><br>
                <form action="" method="post">
                    <select name="category_id" id="">
                        <option value="#">--Chọn danh mục--</option>
                        <?php
                            $show_category = $brand -> show_category($category_name);
                            if ($show_category) {
                                while ($result = $show_category -> fetch_assoc()) {

                        ?>
                            <option <?php if($resultA['category_id'] == $result['category_id']){ echo "SELECTED";}?> value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>  
                        <?php
                                }
                            }
                            
                        ?>
                    </select><br>
                    <input type="text" name="brand_name" placeholder="Nhập tên loại sản phẩm" value="<?php echo $resultA['brand_name']?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
    </body>
</html>