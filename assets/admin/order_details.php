<?php
    include "header.php";
    include "slider.php";
    include "class/order_product_class.php";
?>

<?php
    // Lấy order_id từ URL
    $serId = isset($_GET['id']) ? $_GET['id'] : null;

    $orderProduct = new OrderProduct();
    $show_order_info = $orderProduct -> show_order_info($serId);
    if ($show_order_info) {
        $result_order_info = $show_order_info -> fetch_assoc();
    }
    // Lấy thông tin chi tiết sản phẩm từ bảng tbl_order_details
    $show_order_details = $orderProduct -> show_order_details($serId);
?>
<div class="admin-content_right admin-content_right_detail">
<div class="admin-content_right-category_add">

<section class="pay_service">
    <div class="container">
        <h1>Chi tiết đơn hàng</h1>

        <div class="pay_service-content">

            <!-- Thông tin hóa đơn -->
            <div class="pay_service-ct">
                <span>Mã hóa đơn: </span>
                <p><?php echo $result_order_info['order_id'] ?></p>
            </div>

            <div class="pay_service-ct">
                <span>Họ tên khách hàng: </span>
                <p><?php echo $result_order_info['order_name'] ?></p>
            </div>

            <div class="pay_service-ct">
                <span>Địa chỉ: </span>
                <p><?php echo $result_order_info['order_address'] ?></p>
            </div>

            <div class="pay_service-ct">
                <span>SĐT: </span>
                <p><?php echo $result_order_info['order_sdt'] ?></p>
            </div>

            <div class="pay_service-ct">
                <span>Email: </span>
                <p><?php echo $result_order_info['order_email'] ?></p>
            </div>

            <div class="pay_service-ct">
                <span>Thời gian đặt: </span>
                <p><?php echo $result_order_info['order_time'] ?></p>
            </div>

            <!-- Bắt đầu phần Thông tin sản phẩm -->
            <span style="
                color: #bb3107;
            ">Thông tin sản phẩm: </span>
            <div class="pay_service-ct pay_service-ct-table">

                <!-- Kiểm tra nếu có sản phẩm trong tbl_order_details -->
                <?php if ($show_order_details->num_rows > 0): ?>
                    <table border=".3" cellpadding="10" cellspacing="0">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php while ($row_order_details = $show_order_details->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row_order_details['product_name']; ?></td> 
                                <td style="text-align: center;"><?php echo $row_order_details['quantity']; ?></td> 
                                <td style="text-align: center;"><?php echo $row_order_details['product_price']; ?>đ</td> 
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php else: ?>
                    <p>Không có sản phẩm nào trong hóa đơn.</p>
                <?php endif; ?>
            </div>
            <!-- Kết thúc phần Thông tin sản phẩm -->

            <div class="pay_service-ct">
                <span>Ghi chú: </span>
                <p>
                    <?php 
                    if (!empty($result_order_info) && isset($result_order_info['order_note'])) { 
                        if ($result_order_info['order_note'] == null || $result_order_info['order_note'] == '') {
                            echo "Không có ghi chú nào.";
                        } else {
                            echo $result_order_info['order_note'];
                        }
                    } else {
                        echo "Không có thông tin ghi chú nào.";
                    }
                    ?>
                </p>
            </div>


            <div class="pay_service-ct">
                <span>Tổng tiền: </span>
                <p><?php echo number_format($result_order_info['order_product_price'], 0, ',', '.'); ?>đ</p>
            </div>

            <div class="pay_service-ct btn_pay-ser">
                <!-- <a class="btn_pay-ser-ct" href="pay_complete.php?id=<?php echo $result_order_info['ser_id']; ?>">Xác nhận thanh toán</a> -->
                <a class="btn_pay-ser-ct" href="./order_product_list.php">Trở về</a>
            </div>

        </div>
    </div>
    </div>
    </div>
</section>
</section>
</body>
</html>