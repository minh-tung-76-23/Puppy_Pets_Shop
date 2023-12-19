<?php
    include "class/product_class.php";
    $product = new Product();
    // if (!isset($_GET["category_id"]) || ($_GET["category_id"]) == NULL) {
    //     echo "<script>window.location = 'categorylist.php' </script>";
    // } else {
        $product_id = $_GET["product_id"];
    // }

    $delete_product = $product -> delete_product($product_id);

?>