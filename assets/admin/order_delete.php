<?php
    include "class/order_product_class.php";
    $orderProduct = new OrderProduct();
    // if (!isset($_GET["category_id"]) || ($_GET["category_id"]) == NULL) {
    //     echo "<script>window.location = 'categorylist.php' </script>";
    // } else {
        $ser_id = $_GET['ser_id'];
    // }

    $delete_order = $orderProduct -> delete_order($ser_id);
?>