<?php
    include "header.php";
?>
<section class="user_info">
    <div class="container">
        <div id="toast">
       
        </div>
        
        <div class="category-top">
            <p>Trang Chủ</p> <span>/</span> <p style="color:#bb3107;">Thông tin khách hàng</p>
        </div>
        <?php 
           $username =  isset($_SESSION['username']) ? $_SESSION['username'] : null;
            $sql_info = "SELECT * FROM tbl_user WHERE user_username = '$username'";
            $get_info = $conn->query($sql_info);
            $info_user = $get_info->fetch_assoc();
        ?>
        <div class="user_info-ct">
            <form action="update_userinfo.php" method="post" class="service_item-form user_info-form">
                <h2>THÔNG TIN KHÁCH HÀNG</h2>
                <div class="input-type">
                    <label for="">ID Khách hàng</label>
                    <input type="text" name="txtid" value="<?php echo $info_user['user_id']?>" readonly>
                </div>

                <div class="input-type">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="txtusername" value="<?php echo $info_user['user_username']?>" disabled>
                </div>

                <div class="input-type">
                    <label for="">Họ Tên</label>
                    <input type="text" name="txthoten" required 
                        <?php echo empty($info_user['user_name']) ? 'placeholder="Chưa có thông tin về họ tên"' : 'value="' . $info_user['user_name'] . '"'; ?>
                    >
                </div>


                <div class="input-type">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="txtdiachi" required 
                        <?php echo empty($info_user['user_address']) ? 'placeholder="Chưa có thông tin về địa chỉ"' : 'value="' . $info_user['user_address'] . '"'; ?>
                    >
                </div>

                <div class="input-type">
                    <label for="">Email</label>
                    <input type="text" name="txtemail" required 
                        <?php echo empty($info_user['user_email']) ? 'placeholder="Nhập email"' : 'value="' . $info_user['user_email'] . '"'; ?>
                    >
                </div>

                <div class="input-type">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="txtsdt" required 
                        <?php echo empty($info_user['user_sdt']) ? 'placeholder="Nhập Số điện thoại"' : 'value="' . $info_user['user_sdt'] . '"'; ?>
                    >
                </div>
                <?php
                    if (isset($_SESSION['update_success'])) {
                        
                ?>
                <p style="color: red; padding-top:6px; padding-left:30%;font-size:14px;"><?php echo $_SESSION['update_success'];?></p>
                <?php
                        unset($_SESSION['update_success']); 
                    }
                ?>


                <input type="submit" name="updateinfo" value="Cập nhật thông tin" class="btn_submit" >
            </form>
        </div>

        <div class="user_product">
            <h2>Dịch Vụ Đã Đăng Ký</h2>
            <?php
                if (isset($_SESSION['delete-ser_success'])) {
                    echo '<script>';
                    echo 'console.log("' . $_SESSION['delete-ser_success'] . '");'; // Debug log
                    echo 'alert("' . $_SESSION['delete-ser_success'] . '");';
                    echo 'window.location.href = "user.php";';
                    echo '</script>';
                    unset($_SESSION['delete-ser_success']); 
                }
            ?>
            <table>
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Mã đơn</td>
                        <td>Thời gian đặt</td>
                        <td>Tên khách hàng</td>
                        <td>SĐT</td>
                        <td>Địa chỉ</td>
                        <td>Dịch vụ</td>
                        <td>Thông tin</td>
                        <td>Thành tiền</td>
                        <td>Lựa chọn</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($_SESSION['username'])) {
                            $sql_prdlist = "SELECT tbl_service_register.*, tbl_service.service_name, tbl_user.user_username 
                            FROM tbl_service_register 
                            INNER JOIN tbl_service ON tbl_service_register.service_id = tbl_service.service_id
                            INNER JOIN tbl_user ON tbl_service_register.user_id = tbl_user.user_id
                            ORDER BY tbl_service_register.ser_id DESC";
                            
                            $get_prdt = $conn->query($sql_prdlist);
                            $i = 0;
                            while($ser_regis = $get_prdt->fetch_assoc()) {
                                if($ser_regis['user_username'] == $_SESSION['username']) {
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $ser_regis['ser_id'];?></td>
                        <td><?php echo $ser_regis['ser_time'];?></td>
                        <td><?php echo $ser_regis['ser_name'];?></td>
                        <td><?php echo $ser_regis['ser_sdt'];?></td>
                        <td><?php echo $ser_regis['ser_diachi'];?></td>
                        <td><?php echo $ser_regis['service_name'];?></td>
                        <td><?php echo $ser_regis['ser_info'];?></td>
                        <td><?php echo $ser_regis['ser_total'];?></td>
                        <td>
                            <?php if ($ser_regis['ser_status'] == 1): ?>
                                <a><p>Chờ xác nhận</p><br><br></a>
                                <a href="user_delete.php?id=<?php echo $ser_regis['ser_id'];?>">Huỷ dịch vụ</a>
                            <?php elseif ($ser_regis['ser_status'] == 2): ?>
                                <a><p>Chờ hoàn thành</p><br><br></a>
                                <?php if (isset($_SESSION['pay_complete']) && in_array($ser_regis['ser_id'], $_SESSION['pay_complete'])) { ?>
                                    <a><p>Đã thanh toán</p><br><br></a>
                                <?php } else{?>
                                    <a href="user_pay.php?id=<?php echo $ser_regis['ser_id'];?>">Thanh Toán</a><br><br>
                                <?php }?>
                            <?php elseif ($ser_regis['ser_status'] == 0): ?>
                                <a href="print_invoice.php?id=<?php echo $ser_regis['ser_id'];?>"><p>Đã hoàn thành</p></a>
                            <?php endif; ?>
                        </td>

                    </tr>

                    <?php
                                    // unset($_SESSION['pay_complete']);
                                }
                            }
                            if ($i === 0) {
                    ?>
                            <tr>
                                <td colspan="10">Bạn chưa đăng kí dịch vụ nào!</td>
                            </tr>
                    <?php
                            }
                        }
                    ?>

                </tbody>
            </table>
        </div>
        
        <div class="user_product">
            <h2>Đơn hàng đã đặt</h2>
            <?php
                if (isset($_SESSION['delete-ser_success'])) {
                    echo '<script>';
                    echo 'console.log("' . $_SESSION['delete-ser_success'] . '");'; // Debug log
                    echo 'alert("' . $_SESSION['delete-ser_success'] . '");';
                    echo 'window.location.href = "user.php";';
                    echo '</script>';
                    unset($_SESSION['delete-ser_success']); 
                }
            ?>
            <table>
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Mã đơn</td>
                        <td>Thời gian đặt</td>
                        <td>Tên khách hàng</td>
                        <td>SĐT</td>
                        <td>Địa chỉ</td>
                        <td>Thành tiền</td>
                        <td>Thông tin</td>
                        <td>Lựa chọn</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($_SESSION['username'])) {
                            $user_username = $_SESSION['username'];
                            $sql_get_user_id = "SELECT user_id FROM tbl_user WHERE user_username = '$user_username'";
                            $result_user_id = $conn->query($sql_get_user_id);
                            $row_user_id = $result_user_id->fetch_assoc();
                            $user_id = $row_user_id['user_id'];

                            $sql_prd_order_list = "SELECT * FROM tbl_order_product
                            ORDER BY tbl_order_product.order_id DESC";
                            $get_prdt_order = $conn->query($sql_prd_order_list);
                            $i = 0;
                            while($order_product = $get_prdt_order->fetch_assoc()) {
                                if($order_product['order_user_id'] == $user_id) {
                                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $order_product['order_id'];?></td>
                        <td><?php echo $order_product['order_time'];?></td>
                        <td><?php echo $order_product['order_name'];?></td>
                        <td><?php echo $order_product['order_sdt'];?></td>
                        <td><?php echo $order_product['order_address'];?></td>
                        <td><?php echo number_format($order_product['order_product_price'], 0, ',', '.') . '₫';?></td>
                        <td><a href="order_details.php?id=<?php echo $order_product['order_id'];?>"><p>Xem chi tiết</p></a></td>
                        <td>
                            <?php if ($order_product['order_status'] == 0): ?>
                                <!-- <a href="user_pay.php?id=<?php echo $order_product['order_id'];?>">Thanh toán</a><br><br> -->
                                <a><p>Chờ xác nhận</p><br><br></a>
                                <a href="order_delete.php?id=<?php echo $order_product['order_id'];?>">Huỷ đơn hàng</a>
                            <?php elseif ($order_product['order_status'] == 2): ?>
                                <a><p>Đang giao hàng</p></a>
                            <?php else: ?>
                                <a href="print_invoice_order.php?id=<?php echo $order_product['order_id'];?>">Đã hoàn thành</a>
                            <?php endif; ?>
                        </td>

                    </tr>

                    <?php
                                }
                            }
                            if ($i === 0) {
                    ?>
                            <tr>
                                <td colspan="10">Bạn chưa đăng kí dịch vụ nào!</td>
                            </tr>
                    <?php
                            }
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>