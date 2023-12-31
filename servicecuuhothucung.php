<?php
    include "header.php";
?>

<section class="service_item-1">
    <div class="container">
        <div class="category-top">
            <p>Trang Chủ</p> <span>/</span> <p>Dịch vụ</p><span>/</span> <p style="color:#bb3107;"> Cứu hộ thú cưng</p>
        </div>
        <div class="service_item-1-ct">
            <h2>DỊCH VỤ CỨU HỘ THÚ CƯNG</h2>
            <div class="service_item-1_ct-top">
                <p>Có nhiều trường hợp thú cưng gặp phải sự cố mà bạn không biết cách giải quyết nên dịch vụ cứu hộ thú cưng ra đời nhằm đáp ứng nhu cầu của bạn. Hãy cùng tìm hiểu về dịch vụ này qua bài viết sau.</p>
                <img src="./assets/img/service/service_item1/1590765042_53238e0e3389cd205b8b.jpg" alt="">
                <p>Đội ngũ cứu hộ thú cưng tại các bệnh viện hay các cơ sở cung cấp dịch vụ cứu hộ thú cưng cùng làm việc chung một mục đích đó là mong mang lại cuộc sống tươi đẹp cho các chú chó, chú mèo, thú cưng nói chung. </p>
            </div>

            <div class="service_item-1_ct-bottom">
                <h3>Cứu hộ thú cưng tại Puppy’s Pet</h3>
                <p>Những người nằm trong đội ngũ cứu hộ phải là những người yêu thú cưng từ đó tinh thần trách nhiệm của họ đối với thú cưng được nâng cao hơn, tự giác hơn. Mọi nhân viên cứu hộ đều được đào tạo nghiệp vụ chuyên nghiệp cộng với tinh thần yêu động vật sẽ mang lại dịch vụ tốt nhất.</p>
                <p>Và dịch vụ này thì phổ biến nhiều hơn là dịch vụ cứu hộ thú cưng tại nhà, vì việc cứu hộ tại nhà có rất nhiều bất cập từ địa điểm xa, người miêu tả hoàn cảnh không chính xác hoặc nhân viên cứu hộ không hiểu hoàn cảnh dẫn đến mang thiếu dụng cụ hoặc thiếu thuốc cần thiết.</p>
                <p>Nên dịch vụ cứu hộ thú cưng ngay tại đơn vị đó sẽ hiệu quả hơn, chính xác hơn và mang lại nhiều hiệu quả hơn. Tại cơ sở có đầy đủ dụng cụ, có nhiều các bác sĩ thú y chăm sóc, khám chữa, …</p>
                <p>Hãy liên hệ ngay <span style="color: #bb3107; font-weight:bold;">hotline: 0916 338 901</span> của cửa hàng Puppy’s Pet để được tư vấn và hỗ trợ nhanh nhất về các dịch vụ nhé.</p>
                <img src="./assets/img/service/service_item1/1590765299_9bb6c6d3d7e0746b093c.jpg" alt="">
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
<<<<<<< HEAD
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
=======
            <form action="" method="post" class="service_item-form">
                <h2>ĐĂNG KÝ DỊCH VỤ</h2>
                <div class="input-type">
                    <label for="">Họ Tên</label>
                    <input type="text" name="txthoten" required placeholder="Nhập họ tên">
>>>>>>> 59cc3e513b86d1c91814760717b79d6a09919115
                </div>

                <div class="input-type">
                    <label for="">Email</label>
<<<<<<< HEAD
                    <input type="text" name="txtemail" required 
                        <?php echo empty($info_user['user_email']) ? 'placeholder="Nhập email"' : 'value="' . $info_user['user_email'] . '"'; ?>
                    >
=======
                    <input type="text" name="txtemail" required placeholder="Nhập Email">
>>>>>>> 59cc3e513b86d1c91814760717b79d6a09919115
                </div>

                <div class="input-type">
                    <label for="">Số điện thoại</label>
<<<<<<< HEAD
                    <input type="text" name="txtsdt" required 
                        <?php echo empty($info_user['user_sdt']) ? 'placeholder="Nhập Số điện thoại"' : 'value="' . $info_user['user_sdt'] . '"'; ?>
                    >
=======
                    <input type="text" name="txtsdt" required placeholder="Nhập Số điện thoại">
>>>>>>> 59cc3e513b86d1c91814760717b79d6a09919115
                </div>

                <div class="input-type">
                    <label for="">Địa chỉ</label>
<<<<<<< HEAD
                    <input type="text" name="txtdiachi" required 
                        <?php echo empty($info_user['user_address']) ? 'placeholder="Chưa có thông tin về địa chỉ"' : 'value="' . $info_user['user_address'] . '"'; ?>
                    >
=======
                    <input type="text" name="txtdiachi" required placeholder="Nhập địa chỉ">
>>>>>>> 59cc3e513b86d1c91814760717b79d6a09919115
                </div>

                <div class="input-type">
                    <label for="">Dịch vụ đăng ký</label>
<<<<<<< HEAD
                    <input type="text" name="txtdichvu" value="Cứu hộ thú cưng" readonly>
                </div>

                <?php
                    // Hiển thị thông báo thành công nếu có
                    if (isset($_SESSION['register-ser_success'])) {
                        echo '<script>alert("' . $_SESSION['register-ser_success'] . '");</script>';
                        echo '<script>window.location.href = "servicecuuhothucung.php";</script>';
                        unset($_SESSION['register-ser_success']); // Xóa thông báo thành công sau khi đã hiển thị
                    }
                ?>
=======
                    <input type="text" name="txtdichvu" value="Dịch vụ cứu hộ thú cưng" disabled>
                </div>

>>>>>>> 59cc3e513b86d1c91814760717b79d6a09919115
                <input type="submit" name="submit" value="Đăng ký ngay" class="btn_submit" >
            </form>

            <div class="service_item-ct">
                <img src="./assets/img/service/service_item1/Thu-Y--3.jpg" alt="">
            </div>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>