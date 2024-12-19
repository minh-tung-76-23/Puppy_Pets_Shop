<?php
    session_start();
    ob_start();
    include "class/serviced_class.php";
    $serviced = new Serviced();

    if(isset($_GET['ser_id'])) {
        $ser_id = $_GET['ser_id'];

        $update_seviced = $serviced -> update_serviced($ser_id);

        if ($update_seviced) {
            
            header('Location: servicelist_register.php');
            exit();
        } else {
            echo "Cập nhật thất bại: ";
        }
    } else {
        echo "Không có mã đơn dịch vụ được cung cấp.";
    }
    ob_get_flush();
?>
