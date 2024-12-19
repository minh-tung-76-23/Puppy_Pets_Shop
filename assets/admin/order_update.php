<?php
    session_start();
    ob_start();
    include "class/order_product_class.php";
    $orderProduct = new OrderProduct();

    if(isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];

        $update_order = $orderProduct -> update_order($order_id);

        if ($update_order) {
            
            header('Location: order_product_list.php');
            exit();
        } else {
            echo "Cập nhật thất bại: ";
        }
    } else {
        echo "Không có mã đơn dịch vụ được cung cấp.";
    }
    ob_get_flush();
?>
