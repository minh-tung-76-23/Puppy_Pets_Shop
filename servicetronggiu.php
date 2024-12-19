<?php
    include "header.php";
?>

<section class="service_item-1">
    <div class="container">
        <div class="category-top">
            <p>Trang Chủ</p> <span>/</span> <p>Dịch vụ</p><span>/</span> <p style="color:#bb3107;"> Trông giữ chó mèo</p>
        </div>
        <div class="service_item-1-ct">
            <h2>DỊCH VỤ TRÔNG GIỮ CHÓ MÈO</h2>
            <div class="service_item-1_ct-top">
                <p>Bạn đang lo lắng không biết sẽ gửi chó mèo ở đâu an toàn và uy tín trước mùa tết cần kề? Bạn đang cần tìm một dịch vụ trông giữ chó mèo đồng hành trong những ngày đặc biệt như lễ, tết, đi du lịch hoặc đi công tác đột xuất…</p>
                <img src="./assets/img/service/service_item1/phong-vip-danh-cho-cun.jpg" alt="">
                <p>Với kinh nghiệm nhiều năm trong ngành chăm sóc thú cưng, dịch vụ trông giữ chó mèo Puppy’s Pet là một địa chỉ được rất nhiều khách hàng tin tưởng và “chọn mặt gửi vàng” khi cần hỗ trợ chăm sóc và trông giữ chó mèo, đặc biệt là những dịp lễ tết sắp đến. Liên hệ ngay để được tư vấn và hỗ trợ nhanh nhất nhé.</p>
            </div>

            <div class="service_item-1_ct-bottom">
                <h3>Dịch vụ giữ chó mèo tại Puppy’s Pet</h3>
                <p>Cửa hàng chăm sóc thú cưng Puppy’s Pet là một trong nhữn địa chỉ cung cấp dịch vụ trông giữ chó mèo uy tín và chất lượng. Đây là một địa chỉ được rất nhiều khách hàng “chọn mặt gửi vàng” trong việc chăm sóc và trông giữ thú cưng những ngày bận rộn, đặc biệt là dịp lễ, tết sắp tới.</p>
                <p>Tại Puppy’s Pet thú cưng của bạn sẽ được trải nghiệm một môi trường sống với đầy đủ tiện ích, được chăm sóc tận tình với đầy đủ các loại dịch vụ kèm theo như: cắt tỉa lông cho chó mèo, tạo kiểu tóc chó mèo, chế độ dinh dưỡng, thức ăn cho chó mèo, tắm rửa và vệ sinh cho chó mèo...</p>
                <p>Với kinh nghiệm nhiều năm trong việc chăm sóc và nuôi dưỡng thú cưng, Puppy’s Pet đã đồng hành cùng hàng ngàn khách hàng chăm sóc “boss” khi vắng nhà. Những chú chó mèo được Puppy’s Pet chăm sóc, khi ra về trở nên mập mạp, khỏe khoắn, thậm chí là được thiết lập các thói quen ăn uống, nghỉ ngơi đúng giờ</p>
                <p>Hãy liên hệ ngay <span style="color: #bb3107; font-weight:bold;">hotline: 0916 338 901</span> của cửa hàng Puppy’s Pet để được tư vấn và hỗ trợ nhanh nhất về dịch vụ trông giữ chó mèo nhé.</p>
                <img src="./assets/img/service/service_item1/dich-vu-trong-giu-cho-meo-2-jpg.webp" alt="">
                <ul><span>Puppy’s Pet cam kết:</span>
                    <li>Không gian rộng, thoải mái để thú cưng vận động.</li>
                    <li>Phòng ốc vệ sinh sạch sẽ, tiệt trùng đảm bảo mang lại sức khỏe tốt cho thú cưng.</li>
                    <li>Luôn tắm rửa và chăm sóc thú cưng như trải nghiệm tại nhà.</li>
                    <li>Thiết lập thời gian ăn uống đúng giờ, tạo những thói quen tốt cho thú cưng.</li>
                    <li>Có chương trình ưu đãi đói với khách hàng gửi cho mèo thường xuyên.</li>
                </ul>
                <p>Với kinh nghiệm thực tế từ việc chăm sóc rất nhiều loại thú cưng khác nhau, Puppy’s Pet luôn sẵn sàng hỗ trợ bạn mọi lúc.</p>
            </div>

        </div>

        <div class="service_item-1-regis">
            <?php
                if(isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $sql_info = "SELECT * FROM tbl_user WHERE user_username = '$username'";
                    $get_info = $conn->query($sql_info);
                    $info_user = $get_info->fetch_assoc();
                }
            ?>
            <form action="register_service.php" method="post" class="service_item-form">
                <h2>ĐĂNG KÝ DỊCH VỤ</h2>
                <div class="input-type">
                    <label for="">Họ Tên</label>
                    <input type="text" name="txthoten" required 
                        <?php echo empty($info_user['user_name']) ? 'placeholder="Chưa có thông tin về họ tên"' : 'value="' . $info_user['user_name'] . '"'; ?>
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

                <div class="input-type">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="txtdiachi" required 
                        <?php echo empty($info_user['user_address']) ? 'placeholder="Chưa có thông tin về địa chỉ"' : 'value="' . $info_user['user_address'] . '"'; ?>
                    >
                </div>

                <div class="input-type">
                    <label for="">Dịch vụ đăng ký</label>
                    <input type="text" name="txtdichvu" value="Dịch vụ trông giữ chó mèo" readonly>
                </div>

                <div class="input-type">
                    <label for="">Phí dịch vụ</label>
                    <input type="text" name="txtphidv" value="60.000₫/ ngày" disabled>
                </div>

                <div class="input-type">
                    <label for="">Thời gian(ngày)</label>
                    <input type="number" name="txtinfo" value="1" min="1">
                </div>

                <div class="input-type">
                    <label for="">Thành tiền</label>
                    <input type="text" name="txttotal" value="60.000₫" readonly>
                </div>
                
                <div id="toast">
       
                </div>

                <?php
                    if (isset($_SESSION['register-ser_success'])) {
                        echo <<<HTML
                        <script>
                            showSuccessToast();
                            
                        </script>
                        HTML;
                        unset($_SESSION['register-ser_success']); 
                    }
                ?>

                <input type="submit" name="submit" value="Đăng ký ngay" class="btn_submit" >
            </form>

            <div class="service_item-ct">
                <img src="./assets/img/service/service_item1/162507.png" alt="">
            </div>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>