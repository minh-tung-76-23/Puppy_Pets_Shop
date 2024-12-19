<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
?>

<?php
    $product = new Product();
    $product_id = $_GET["product_id"];

    $get_product = $product -> get_product($product_id);

    if ($get_product) {
        $resultA = $get_product -> fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        if ($_FILES["product_img"]["name"] != "") {
            // Nếu có chọn ảnh mới, xử lý và lưu ảnh mới
            $product_img = $_FILES["product_img"]["name"];
            move_uploaded_file($_FILES["product_img"]["tmp_name"], "uploads/" . $_FILES["product_img"]["name"]);
        } else {
            $product_img = $resultA['product_img']; // Giữ nguyên ảnh cũ nếu không có ảnh mới
        }

        // Cập nhật ảnh chi tiết sản phẩm nếu có chọn ảnh mới
        if (!empty($_FILES["product_img_des"]["name"])) {
            $product_img_des = array();
            foreach ($_FILES["product_img_des"]["name"] as $key => $value) {
                $product_img_des[] = $_FILES["product_img_des"]["name"][$key];
                move_uploaded_file($_FILES["product_img_des"]["tmp_name"][$key], "uploads/" . $_FILES["product_img_des"]["name"][$key]);
            }
        } else {
            $product_img_des = $product->getProductImageDetails($product_id); // Giữ nguyên ảnh chi tiết cũ nếu không có ảnh mới
        }
            
        $update_product = $product -> update_product($product_id, $_POST, $_FILES);
    }
?>

<div class="admin-content_right">
            <div class="admin-content_right-product_add">
                <h1>Sửa sản phẩm</h1>
                <form action="" method="post" enctype="multipart/form-data"  onsubmit="updateTextarea()">
                    <label for="">Tên sản phẩm <span style="color: red;">*</span></label>
                    <input type="text" required name="product_name" value="<?php echo $resultA['product_name']?>">
                    <label for="">Danh mục sản phẩm <span style="color: red;">*</span></label>
                    <select name="category_id" id="category_id">
                        <option value="#">--Chọn Danh Mục--</option>
                        <?php
                            $show_category = $product -> show_category();
                            if ($show_category) {
                                while ($result = $show_category -> fetch_assoc()) {


                        ?>
                        <option <?php if($resultA['category_id'] == $result['category_id']){ echo "SELECTED";}?> value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>  

                        <?php
                                }
                            }
                        ?>
                    </select>

                    <label for="">Loại sản phẩm <span style="color: red;">*</span></label>
                    <select name="brand_id" id="brand_id">
                        <option value="#">--Chọn Loại sản phẩm--</option>
                        <?php
                            $show_brand = $product -> show_brand();
                            if ($show_brand) {
                                while ($result = $show_brand -> fetch_assoc()) {


                        ?>
                        <option <?php if($resultA['brand_id'] == $result['brand_id']){ echo "SELECTED";}?> value="<?php echo $result['brand_id']?>"><?php echo $result['brand_name']?></option>  

                        <?php
                                }
                            }
                        ?>
                    </select>

                    <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
                    <input type="text" name="product_price" required value="<?php echo $resultA['product_price']?>">

                    <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                    <input type="text" placeholder="" required name="product_price_new" value="<?php echo $resultA['product_price_new']?>">

                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label><br>
                    <textarea name="product_des" id="editor" cols="30" rows="10" style="display: none;"><?php echo $resultA['product_des']; ?></textarea><br>

                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label><br>
                    <img src="uploads/<?php echo $resultA['product_img']; ?>" alt="Product Image" class = "pdt_img">
                    <input type="file" name="product_img" >


                    <label for="">Ảnh chi tiết sản phẩm <span style="color: red;">*</span></label>
                    <input type="file" multiple required name="product_img_des[]">

                    <!-- Hiển thị ảnh chi tiết sản phẩm từ database -->
                    <?php
                        $product_images = $product->getProductImages($product_id);
                        foreach ($product_images as $image) {
                            echo "<img src='uploads/{$image['product_img_des']}' alt='Product Image' class = 'img_des'>";
                        }
                    ?>

                    <button type="submit" name="update">Sửa</button>

                </form>
            </div>
        </div>
    </section>
</body>

<script>
    function updateTextarea() {
        // Lấy nội dung từ CKEditor và cập nhật vào textarea
        var editorData = ClassicEditor.instances.editor.getData();
        document.getElementById('editor').value = editorData;
    }

    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        ckfinder: {
            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        },
        toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script>
    $(document).ready(function() {
       $('#category_id').change(function() {
            // alert($(this).val());

            var x = $(this).val();
            $.get("productadd_ajax.php", {category_id:x}, function(data) {
                $("#brand_id").html(data);
            })
       });
    })
</script>

</html>