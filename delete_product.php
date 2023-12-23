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
    }

    // Chuyển hướng về trang giỏ hàng
    header('Location: cart.php');
    exit();
?>
