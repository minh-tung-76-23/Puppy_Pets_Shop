<?php
    // Include file config.php để kết nối đến database
    include 'config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Lấy category_id từ ajax request
    $category_id = $_GET['category_id'];

    // Query để lấy thông tin thương hiệu
    $sql = "SELECT * FROM tbl_brand WHERE category_id = $category_id";

    $result = $conn->query($sql);

    // Xử lý kết quả và hiển thị thông tin
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='menu_select-cart-content'>";
            echo "<p>{$row['brand_name']}</p>";
            echo "</div>";
        }
    }
?>

