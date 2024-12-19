<?php
    include "header.php";
?>

<section class="service">
    <div class="container">
        <div class="category-top">
            <p>Trang Chủ</p> <span>/</span> <p style="color:#bb3107;">Dịch vụ</p>
        </div>

        <h2>DỊCH VỤ THÚ CƯNG</h2>

        <div class="service_mid">

            <?php
                $sql_service = "SELECT * FROM tbl_service";
                $service = $conn->query($sql_service);
                
                // Hiển thị sản phẩm
                while ($row_service = $service->fetch_assoc()) {
            ?>
            <div class="service_content">
                <a href="<?php echo $row_service['service_url']?>">
                    <div class="service_content-img hover_zoom">
                        <div class="overlay"></div>
                        <img class="" src="./assets/img/service/<?php echo $row_service['service_img']?>" alt="<?php echo $row_service['service_name']?>">
                    </div>
                    <div class="service_content-ct">
                        <p><?php echo $row_service['service_name']?></p>
                    </div>
                </a>
            </div>

            <?php
                }
            ?>
        </div>

        <div class="service_bottom">
            <div class="service_bottom-item">
                <p class= "it-top">
                    <i class="fa-solid fa-angle-down"></i>  
                    <span><b>Dịch Vụ Chăm Sóc Thú Cưng Là Gì?</b></span>
                    <!-- <i class="fa-solid fa-angle-up"></i> -->
                </p>

                <div class="service_bottom-item-ct">
                    <p>
                        <b>Chăm sóc thú cưng</b> là bao gồm tất cả việc như: vệ sinh cho vật nuôi và khu vực xung quanh thú cưng, tiêm phòng cho thú cưng, chế độ dinh dưỡng,… Ngoài ra, chải chuốt, huấn luyện và cung cấp sức khỏe hoàn toàn cho thú cưng của bạn cũng là một phần của việc chăm sóc thú cưng. Nếu bạn đối xử với thú cưng của bạn như một người bạn thì điều đó có nghĩa là bạn đang nỗ lực để đảm bảo sức khỏe tổng thể của chúng và đó là tất cả những gì về chăm sóc thú cưng.
                    </p>
                    <p>
                        Thường xuyên tắm rửa sẽ giúp cho thú cưng của bạn luôn thoải mái và dễ chịu, Việc giữ cho thú cưng luôn sạch sẽ thơm tho sẽ đảm bảo sức khỏe của thú cưng và mọi người xung quanh. Ngoài ra, việc làm sạch môi trường xung quanh bằng cách dọn dẹp, lau chùi lông vật nuôi rơi trên sàn gỗ và đảm bảo cho môi trường xung quanh vật nuôi sạch sẽ.
                    </p>
                    <p>Chế độ dinh dưỡng Cho thú cưng phải hợp lý và thay nước thường xuyên… Dắt vật nuôi đi dạo và dành thời gian vui đùa với chúng. Và thú cưng được hưởng các dịch vụ y tế tốt nhất nếu bị bệnh</p>
                </div>
            </div>

            <div class="service_bottom-item">
                <p class= "it-top">
                    <i class="fa-solid fa-angle-down"></i>  
                    <span><b>Địa Chỉ Chăm Sóc Thú Cưng Tận Tình, Uy Tín Ở Đâu</b></span>
                </p>

                <div class="service_bottom-item-ct">
                    <p>Tại&nbsp;<i>trung tâm chăm sóc thú cưng</i>&nbsp;Puppy’s Pet, các bác sĩ và nhân viên của chúng tôi rất thân thiện, hiểu biết và chuyên nghiệp. Với đội ngũ nhân viên được đào tạo từ IBPSA (The International Boarding &amp; Pet Services Association) do đó bạn hoàn toàn có thể tin tưởng ở chúng tôi. Chúng tôi có thể hỗ trợ bạn đưa ra quyết định chăm sóc sức khỏe tốt nhất cho thú cưng của bạn như:</p>
                    <ul>
                        <li>Khám sức khỏe định kì</li>
                        <li>Chăm sóc tại nhà</li>
                        <li>Hướng dẫn chăm sóc thú cưng khi bị bệnh,…</li>
                    </ul>
                    <p>Các nhân viên và bác sĩ tại&nbsp;<i>spa thú cưng</i>&nbsp;Puppy’s Pet cũng là những người biết yêu và chăm sóc động vật.. Chính sách của Puppy’s Pet là bất cứ khi nào thú cưng của bạn cảm thấy không khỏe, chúng tôi sẽ đưa bạn đến gặp bác sĩ thú y bất cứ lúc nào. Mục tiêu chính của Puppy’s Pet là đảm bảo khách hàng và thú cưng của họ được chăm sóc tốt nhất và tận tình nhất có thể. Do đó, Hãy liên hệ với chúng tôi để nhận được dịch vụ chăm sóc thú cưng tận tình, uy tín từ Puppy’s Pet</p>
                </div>
            </div>

            <div class="service_bottom-item">
                <p class= "it-top">
                    <i class="fa-solid fa-angle-down"></i>  
                    <span><b>Chăm Sóc Thú Cưng Như Thế Nào Đúng Cách</b></span>
                </p>

                <div class="service_bottom-item-ct">
                    <p>Trước khi đem thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà vật nuôi cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình.</p>
                    <p>Vậy, ngoài việc cung cấp cho chúng về vật chất, tinh thần như: thức ăn, đồ uống, môi trường sống, vui đùa với thú cưng thì bạn cần cung cấp các dịch vụ y tế cho thú cưng khi bị bệnh hay các dịch vụ làm đẹp. Khi thú cưng khỏe mạnh thì mọi người xung quanh cũng không bị khó chịu hay nhiễm bệnh bởi vật nuôi.</p>
                    <p><strong>Cách chăm sóc tốt nhất cho thú cưng:</strong></p>
                    <ul>
                        <li>Tiêm phòng bệnh</li>
                        <li>Đưa đến bác sĩ thú y để kiểm tra thường xuyên.</li>
                        <li>Cung cấp thực phẩm tốt, bổ dưỡng với nguồn nước sạch.</li>
                        <li>Thường xuyên chơi với thú cưng, cung cấp các bài tập huấn luyện nhằm cải thiện sức khỏe</li>
                        <li>Hãy thân thiện với họ để họ sẽ rất trung thành và chung thủy với bạn.</li>
                    </ul>
                </div>
            </div>

            <div class="service_bottom-item">
                <p class= "it-top">
                    <i class="fa-solid fa-angle-down"></i>  
                    <span><b>Thời Gian Định Kì Chăm Sóc Thú Cưng Là Bao Lâu</b></span>
                </p>

                <div class="service_bottom-item-ct">
                    <p>Các chuyên gia cho rằng, thời gian đưa thú cưng đi chăm sóc sức khỏe định kỳ là khoảng 3-5 tháng. Nhưng nếu vật nuôi của bạn có những biểu hiện bất thường về sức khỏe thì hãy mang tới các cơ sở y tế gần nhất để kiểm tra sức khỏe</p>
                </div>
            </div>

            <div class="service_bottom-item">
                <p class= "it-top">
                    <i class="fa-solid fa-angle-down"></i>  
                    <span><b>Chi Phí Chăm Sóc Thú Cưng Hết Bao Nhiêu</b></span>
                </p>

                <div class="service_bottom-item-ct">
                    <p>Tùy vào các loại hình dịch vụ như tắm rửa, cắt tỉa lông, cắt móng, huấn luyện, làm đẹp cho chó mèo sẽ có mức giá khác nhau. Nhưng đến với Zoi’s Pet bạn sẽ được sử dụng các mức giá rẻ nhất cho chất lượng tốt nhất với các dịch vụ chỉ từ 200.000 đến 5.000.000. Tuy nhiên, đối với dịch vụ tại nhà Zoi’s Pet có thể lấy mắc hơn một chút và nằm trong khoảng 500.000 đến 6.000.000</p>
                </div>
            </div>

            <div class="service_bottom-item">
                <p class= "it-top">
                    <i class="fa-solid fa-angle-down"></i>  
                    <span><b>Tại Sao Thú Cưng Cần Được Chăm Sóc</b></span>
                </p>

                <div class="service_bottom-item-ct">
                    <p>Thú cưng có thể dạy cho người nhiều kỹ năng trong cuộc sống, giúp trẻ em có trách nhiệm, tự tin hơn…, đồng thời còn là một người bạn tuyệt vời của bé. Thật không sai khi nói rằng: Thú cưng chính là bạn của con người. Vì vậy, những người bạn của chúng ta xứng đáng được hưởng những dịch vụ tốt nhất để đảm bảo sức khỏe cho thú cưng cũng như mọi người xung quanh chúng.</p>
                    <p>Tuy nhiên, cũng có nhiều ý kiến cho rằng thú cưng hoàn toàn phụ thuộc vào con chủ của nó. Chúng không thể tự kiếm ăn, sống trong môi trường hiện địa hóa được. Vì vậy,nếu chúng ta đưa một con vật vào nhà, thì phải bảo đảm nó có sự chăm sóc tuyệt vời, thức ăn và môi trường, sự kích thích, chăm sóc y tế. Sẽ rất tàn nhẫn nếu như chúng ta bỏ đói, không chăm sóc chúng.</p>    
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>