<?php
    include "header.php";
?>

<section class="service_item-1">
    <div class="container">
        <div class="category-top">
            <p>Trang Chủ</p> <span>/</span> <p>Dịch vụ</p><span>/</span> <p style="color:#bb3107;"> Chăm sóc thú cưng</p>
        </div>
        <div class="service_item-1-ct">
            <h2>DỊCH VỤ CHĂM SÓC THÚ CƯNG</h2>
            <div class="service_item-1_ct-top">
                <p>Những năm gần đây thị trường chăm sóc thú cưng ngày một phát triển mạnh, đặc biệt là tại các thành phố lớn như HCM, Hà Nội, Đà Nẵng thì dịch vụ chăm sóc thú cưng càng phổ biến hơn. Hình ảnh các cửa hàng chăm sóc thú cưng mọc lên ở khắp nơi tạo điều kiện cho nhiều gia chủ thuận lợi hơn trong việc chăm sóc và làm đẹp cho các boss.</p>
                <p>Từ đó công việc chăm sóc thú cưng cũng trở thành sự quan tâm và lựa chọn của nhiều bạn trẻ, đặc biệt là những bạn yêu thích thú cưng như tìm được một sự đồng điệu và cơ hội phát triển sự nghiệp để vừa thỏa niềm yêu thích thú cưng, vừa có công việc ổn định.</p>
                <img src="./assets/img/service/service_item1/dich-vu-cham-soc-thu-cung-tai-nha-1.jpg" alt="">
                <p>Chăm sóc thú cưng là các công việc liên quan đến việc chăm sóc và “làm đẹp” lại cho thú cưng thông qua các công việc như: cắt tỉa, cạo lông, nhuộm, tắm và vệ sinh cho chó mèo. Ngoài ra ngày nay còn có thêm các hoạt động như: dịch vụ khách sạn cho thú cưng, tư vấn dinh dưỡng, cứu hộ thú cưng….</p>
                <p>Nếu bạn đang tìm kiếm một cửa hàng dịch vụ chăm sóc thú cưng uy tín thì không thể bỏ qua cửa hàng chăm sóc cưng Puppy’s Pet. Sở hữu đội ngũ nhân viên, bác sĩ giàu kinh nghiệm cùng hệ thống máy móc, trang thiết bị hiện đại, Puppy’s Pet trở thành địa chỉ được nhiều người tin tưởng lựa chọn.</p>
            </div>

            <div class="service_item-1_ct-bottom">
                <h3>Dịch vụ chăm sóc thú cưng tại Puppy’s Pet</h3>
                <p>Bạn có thể sử dụng các dịch vụ tại cửa hàng hoặc có thể sử dụng các dịch vụ chăm sóc thú cưng tại nhà của Puppy’s Pet như dịch vụ tắm chó tại nhà, dịch vụ cắt tỉa lông chó mèo tại nhà….</p>
                <p>Tùy vào từng dịch vụ chăm sóc thú cưng và nhu cầu sử dụng của khách hàng mà có mức giá chăm sóc thú cưng khác nhau. Hơn thế nữa trọng lượng cũng như giống chó, mèo cũng ảnh hưởng đến giá của việc chăm sóc thú cưng. Những chú chó càng lớn, thời gian chăm sóc càng lâu thì mức giá thường cao hơn.</p>
                <p>Ngoài ra, Puppy’s Pet còn cung cấp các sản phẩm về thức ăn, sữa tắm, phụ kiện chăm sóc thú cưng….Các sản phẩm đều được chọn lựa kỹ càng từ các thương hiệu uy tín, chất lượng đảm bảo, giá cả phải chăng, giúp bạn hoàn toàn có thể an tâm khi lựa chọn sản phẩm tại đây.</p>
                <p>Hãy liên hệ ngay <span style="color: #bb3107; font-weight:bold;">hotline: 0916 338 901</span> của cửa hàng Puppy’s Pet để được tư vấn và hỗ trợ nhanh nhất về các dịch vụ nhé.</p>
                <img src="./assets/img/service/service_item1/dich-vu-cham-soc-thu-cung-ha-noi-min-1068x712.jpg" alt="">
                <ul><span>Đến với Puppy’s Pet thú cưng nhà bạn sẽ được trải nghiệm các dịch vụ sau đây:</span>
                    <li>Dịch vụ cắt tỉa lông chó mèo.</li>
                    <li>Dịch vụ chăm khách sạn chó mèo.</li>
                    <li>Dịch vụ tắm rửa chó mèo.</li>
                    <li>Dịch vụ tư vấn dinh dưỡng thú cưng.</li>
                    <li>Dịch vụ cứu hộ thú cưng.</li>
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
                    <input type="text" name="txtdichvu" value="Chăm sóc thú cưng" readonly>
                </div>

                <div class="input-type">
                    <label for="">Lựa chọn</label>
                    <select name="txtinfo">
                        <option value="Chăm sóc lẻ">Chăm sóc lẻ</option>
                        <option value="Chăm sóc cơ bản">Chăm sóc cơ bản</option>
                        <option value="Chăm sóc toàn diện">Chăm sóc toàn diện</option>
                    </select>
                </div>

                <div class="input-type">
                    <label for="">Thành tiền</label>
                    <input type="text" name="txttotal" value="150.000₫" readonly>
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
                <img src="./assets/img/service/service_item1/bg1_5e9add918b6f44a48eea52773fea0579.webp" alt="">
            </div>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>