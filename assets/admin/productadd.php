<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
?>

<?php
    $product = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // var_dump($_FILES);
        // echo "<prev>";
        // print_r($_FILES["product_img_des"]['name']);
        // echo "</prev>";
        $insert_product = $product -> insert_product($_POST, $_FILES);
    }
?>

<div class="admin-content_right">
            <div class="admin-content_right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="post" enctype="multipart/form-data"  onsubmit="updateTextarea()">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input type="text" required name="product_name">
                    <label for="">Danh mục sản phẩm <span style="color: red;">*</span></label>
                    <select name="category_id" id="category_id">
                        <option value="#">--Chọn Danh Mục--</option>
                        <?php
                            $show_category = $product -> show_category();
                            if ($show_category) {
                                while ($result = $show_category -> fetch_assoc()) {


                        ?>
                        <option value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>  

                        <?php
                                }
                            }
                        ?>
                    </select>

                    <label for="">Loại sản phẩm <span style="color: red;">*</span></label>
                    <select name="brand_id" id="brand_id">
                        <option value="#">--Chọn Loại sản phẩm--</option>
                        
                    </select>

                    <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
                    <input type="text" name="product_price" required>

                    <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                    <input type="text" placeholder="" required name="product_price_new">

                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label><br>
                    <textarea name="product_des" id="editor" cols="30" rows="10" style="display: none;"></textarea>

                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
                    <input type="file" required name="product_img" >

                    <label for=""> Ảnh chi tiết sản phẩm <span style="color: red;">*</span></label>
                    <input type="file" multiple required name="product_img_des[]">

                    <button type="submit">Thêm</button>
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