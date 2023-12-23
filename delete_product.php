<?php
    // Bắt đầu phiên làm việc
    session_start();

    // Lấy ID sản phẩm từ yêu cầu
    $productId = isset($_GET['id']) ? $_GET['id'] : null;

    // Kiểm tra xem giỏ hàng có tồn tại không
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Tìm vị trí của sản phẩm trong giỏ hàng
        $productIndex = array_search($productId, array_column($_SESSION['cart'], 'id'));

        // Nếu sản phẩm tồn tại trong giỏ hàng, xóa nó
        if ($productIndex !== false) {
            unset($_SESSION['cart'][$productIndex]);
        }
<<<<<<< HEAD
=======

        // Kiểm tra xem giỏ hàng có trống sau khi xóa hay không
        if (empty($_SESSION['cart'])) {
            // Nếu giỏ hàng trống, hủy phiên làm việc và chuyển hướng về trang giỏ hàng với thông báo
            session_unset();
            session_destroy();
            header('Location: cart.php?empty=1');
            exit();
        }
>>>>>>> 59cc3e513b86d1c91814760717b79d6a09919115
    }

    // Chuyển hướng về trang giỏ hàng
    header('Location: cart.php');
    exit();
?>
