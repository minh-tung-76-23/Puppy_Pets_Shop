<?php
    include "class/brand_class.php";
    $brand = new Brand();
    // if (!isset($_GET["category_id"]) || ($_GET["category_id"]) == NULL) {
    //     echo "<script>window.location = 'categorylist.php' </script>";
    // } else {
        $brand_id = $_GET["brand_id"];
    // }

    $delete_brand = $brand -> delete_brand($brand_id);

?>