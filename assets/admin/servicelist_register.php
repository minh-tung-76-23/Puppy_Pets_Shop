<?php
    include "header.php";
    include "slider.php";
    include "class/serviced_class.php";
?>


<?php
    $serviced = new Serviced();
    $show_serviced = $serviced -> show_serviced($serviced);
?>

            <div class="admin-content_right">
                <div class="admin-content_right-category_list admin-content_right-ser_list">
                    <h1>Danh sách hóa đơn dịch vụ </h1>

                    <div class="service_list-top">
                        <form action="./servicelist_search.php" method="post" class= "form_ct form_ct-ser">
                            <div class="input-type">
                                <label for="">Tìm kiếm:</label>
                                <input type="text" name="txtsearch" value="">
                                <input type="submit" name="search" value="Tìm kiếm" class="btn_submit">
                            </div>
                        </form>
                        
                        <form action="inhoadon.php" method="POST" style="padding-right: 20px;">
                            <input type="submit" value="Xuất toàn bộ hóa đơn" class="btn_submit" name="print">
                        </form>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td><b>STT</b></td>
                                <td><b>Mã đơn</b></td>
                                <td><b>Họ tên</b></td>
                                <td><b>Tên đăng nhập</b></td>
                                <td><b>Địa chỉ</b></td>
                                <td><b>Email</b></td>
                                <td><b>SĐT</b></td>
                                <td><b>Thời gian đặt</b></td>
                                <td><b>Dịch vụ</b></td>
                                <td><b>Chi tiết</b></td>
                                <td><b>Thành tiền</b></td>
                                <td><b>Trạng thái</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $totalAmount = 0;
                                if ($show_serviced) {
                                    $i = 0;
                                    while ($result = $show_serviced -> fetch_assoc()) {
                                        $i++;
                                        // Kiểm tra nếu ser_status = 0 mới cộng vào tổng
                                        if ($result['ser_status'] == 0) {
                                            // Loại bỏ các ký tự không phải số từ chuỗi
                                            $numericValue = preg_replace("/[^0-9]/", "", $result['ser_total']);

                                            // Chuyển đổi giá trị thành số
                                            $numericValue = floatval($numericValue);

                                            // Kiểm tra nếu giá trị là số trước khi cộng vào tổng
                                            if (is_numeric($numericValue)) {
                                                $totalAmount += $numericValue;
                                            }
                                        }
                                        
                                ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['ser_id'];?></td>
                                <td><?php echo $result['ser_name'];?></td>
                                <td><?php echo $result['user_username'];?></td>
                                <td><?php echo $result['ser_diachi'];?></td>
                                <td><?php echo $result['ser_email'];?></td>
                                <td><?php echo $result['ser_sdt'];?></td>
                                <td><?php echo $result['ser_time'];?></td>
                                <td><?php echo $result['service_name'];?></td>
                                <td><?php echo $result['ser_info'];?></td>
                                <td><?php echo $result['ser_total'];?></td>
                                <td>
                                <?php
                                    // Hiển thị trạng thái dựa trên giá trị của ser_status
                                    if ($result['ser_status'] == 0) {
                                        echo '<a href="serviced_print.php?ser_id=' . $result['ser_id'] . '" style="color:#2b45f0;">Đã hoàn thành</a>';
                                    } elseif ($result['ser_status'] == 1) {
                                        echo '<a href="servicedupdate.php?ser_id=' . $result['ser_id'] . '" style="color:red;">Duyệt</a> <br><br>';
                                        echo '<a href="serviceddelete.php?ser_id=' . $result['ser_id'] . '" style="color:black;">Xóa</a>';
                                    }elseif ($result['ser_status'] == 2) {
                                        echo '<a href="servicedupdate.php?ser_id=' . $result['ser_id'] . '" style="color:#22c00b;">Chờ hoàn thành</a>';
                
                                    }
                                ?>
                                    <!-- <a href="serviceddelete.php?ser_id=<?php echo $result['ser_id'];?>">Xóa</a> -->
                                </td>
                            </tr>

                            <?php
                                    }
                                } else {
                            ?>
                            <tr>
                                <td colspan="12">Chưa có hóa đơn.</td>
                            </tr>
                            <?php
                                }
                            ?>  
                            
                           
                        </tbody>
                    </table>
                </div>
                <div class="serviced_list-bot">
                    
                    <div class="fomat_price" style="border: 1px solid blue;">
                        <span style="color: blue;">SỐ LƯỢNG ĐƠN</span><p><?php echo $i; ?></p>
                    </div>

                    <?php
                        // Đếm số lượng đơn trong bảng
                        $count_serviced = $serviced->count_serviced();
                        $count_service = $serviced->count_service();
                    ?>
                    
                    <div class="fomat_price" style="border: 1px solid green;">
                        <span style="color: green;">ĐÃ HOÀN THÀNH</span><p><?php echo $count_service; ?></p>
                    </div>

                    <div class="fomat_price" style="border: 1px solid orange;">
                        <span style="color: orange;">CHƯA HOÀN THÀNH</span><p><?php echo $count_serviced; ?></p>
                    </div>

                    <div class="fomat_price" style="border: 1px solid #bb3107;">
                        <span style="color: #bb3107;">TỔNG CỘNG</span><p><?php echo number_format($totalAmount, 0, ',', '.') . '₫'; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>