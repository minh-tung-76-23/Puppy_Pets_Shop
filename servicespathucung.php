<?php
    include "header.php";
?>

<section class="service_item-1">
    <div class="container">
        <div class="category-top">
            <p>Trang Chủ</p> <span>/</span> <p>Dịch vụ</p><span>/</span> <p style="color:#bb3107;"> Spa chó mèo</p>
        </div>
        <div class="service_item-1-ct">
            <h2>DỊCH VỤ SPA THÚ CƯNG</h2>
            <div class="service_item-1_ct-top">
                <p>Spa thú cưng là một trong những dịch vụ chăm sóc thú cưng và làm đẹp cho thú cưng được rất nhiều mọi người yêu thích và lựa chọn, đặc biệt tại các thành phố lớn, mô hình dịch vụ spa thú cưng ngày một trở nên phổ biến bởi nhu cầu nuôi thú cưng ngày một phát triển.</p>
                <p>Những năm gần đây nhu cầu nuôi thú cưng ở nước ta ngày một phát triển mạnh, có rất nhiều người thậm chí sẵn sàng chi trả rất nhiều tiền để sở hữu những giống chó, mèo ngoại nhập với ngoại hình xinh xắn và được nhiều người yêu thích.</p>
                <img src="./assets/img/service/service_item1/dich-vu-Kimipet.jpg" alt="">
                <p>Cửa hàng chăm sóc thú cưng Puppy’s Pet cung cấp đầy đủ dịch vụ spa, chăm sóc thú cưng uy tín và chuyên nghiệp tại tphcm như là dịch vụ cắt tỉa lông cho chó mèo, tắm cho chó mèo, tạo kiểu tóc chó mèo, khách sạn cho mèo..</p>
            </div>

            <div class="service_item-1_ct-bottom">
                <h3>Spa thú cưng tại Puppy’s Pet</h3>
                <p>Những chú chó mèo giờ đây không đơn thuần là vật nuôi trong nhà mà trở thành những người bạn thân thiết, những đứa con tình thần của mỗi gia chủ. Vì thế nhu cầu chăm lo từng miếng ăn, giấc ngủ và làm đẹp cho thú cưng được chú trọng.</p>
                <p>Với nhiều năm kinh nghiệm thực tế trong việc chăm sóc thú cưng, Puppy’s Pet là một trong những địa chỉ cung cấp các dịch vụ spa, chăm sóc thú cưng uy tín và được nhiều khách hàng lựa chọn.</p>
                <p>Tại Puppy’s Pet, các gói dịch vụ vô cùng đa dạng cùng đội ngũ nhân viên có kinh nghiệm và tay nghề cao, luôn mang đến những trải nghiệm an toàn và tốt nhất cho các boss.</p>
                <p>Hãy liên hệ ngay <span style="color: #bb3107; font-weight:bold;">hotline: 0916 338 901</span> của cửa hàng Puppy’s Pet để được tư vấn và hỗ trợ nhanh nhất về các dịch vụ nhé.</p>
                <img src="./assets/img/service/service_item1/1140211079.trong-giu-cho-meo1.jpg" alt="">
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
                    <input type="text" name="txtdichvu" value="Spa cho thú cưng" readonly>
                </div>

                <div class="input-type">
                    <label for="">Lựa chọn</label>
                    <select name="txtinfo">
                        <option value="Spa cơ bản">Spa cơ bản</option>
                        <option value="Spa toàn diện">Spa toàn diện</option>
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