<?php
    include "header.php";
    $serId = isset($_GET['id']) ? $_GET['id'] : null;

    $sql_get_info = "SELECT tbl_service_register.*, tbl_service.service_name
    FROM tbl_service_register 
    INNER JOIN tbl_service ON tbl_service_register.service_id = tbl_service.service_id 
    WHERE ser_id = '$serId'";
    $result_info = $conn->query($sql_get_info);
    $row_info = $result_info->fetch_assoc();
?>
    <section class="pay_service">
        <div class="container">
            <h1>Xác nhận đăng ký dịch vụ </h1>

            <div class="pay_service-content">
                <div class="pay_service-ct">
                    <span>Mã hóa đơn: </span>
                    <p> <?php echo $row_info['ser_id']?></p>
                </div>
                <div class="pay_service-ct">
                    <span>Họ tên khách hàng: </span>
                    <p> <?php echo $row_info['ser_name']?></p>
                </div>
                <div class="pay_service-ct">
                    <span>Địa chỉ: </span>
                    <p><?php echo $row_info['ser_diachi']?></p>
                </div>
                <div class="pay_service-ct">
                    <span>SĐT: </span>
                    <p><?php echo $row_info['ser_sdt']?></p>
                </div>
                <div class="pay_service-ct">
                    <span>Email: </span>
                    <p><?php echo $row_info['ser_email']?></p>
                </div>
                <div class="pay_service-ct">
                    <span>Thời gian đặt: </span>
                    <p><?php echo $row_info['ser_time']?></p>
                </div>
                <div class="pay_service-ct">
                    <span>Dịch vụ: </span>
                    <p><?php echo $row_info['service_name']?></p>
                </div>
                <div class="pay_service-ct">
                    <span>Thông tin: </span>
                    <p><?php echo $row_info['ser_info']?></p>
                </div>
                <div class="pay_service-ct">
                    <span>Thành tiền: </span>
                    <p><?php echo $row_info['ser_total']?></p>
                </div>
                <div class="pay_service-ct btn_pay-ser">
                    <a class="btn_pay-ser-ct" href="pay_complete.php?id=<?php echo $row_info['ser_id'];?>">Xác nhận thanh toán</a>

                    <a class="btn_pay-ser-ct" href="./user.php">Huỷ</a>
                </div>
            </div>
        </div>
    </section>

<?php
    include "footer.php";
?>
