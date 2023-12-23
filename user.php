<?php
    include "header.php";
?>
<section class="user_info">
    <div class="container">
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
                        <td>Lựa chọn</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($_SESSION['username'])) {
                            $sql_prdlist = "SELECT tbl_service_register.*, tbl_service.service_name, tbl_user.user_username 
                            FROM tbl_service_register 
                            INNER JOIN tbl_service ON tbl_service_register.service_id = tbl_service.service_id
                            INNER JOIN tbl_user ON tbl_service_register.user_id = tbl_user.user_id";
                            
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
                        <td>
                            <a href="user_delete.php?id=<?php echo $ser_regis['ser_id'];?>">Huỷ dịch vụ</a>
                        </td>
                    </tr>

                    <?php
                                }
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