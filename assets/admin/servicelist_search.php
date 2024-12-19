<?php
    include "header.php";
    include "slider.php";
    include "class/serviced_class.php";
?>


<?php
    $serviced = new Serviced();
    $searchTerm = isset($_POST['txtsearch']) ? $_POST['txtsearch'] : null;
    $search_serviced = $serviced -> search_serviced($searchTerm);
?>

            <div class="admin-content_right">
                <div class="admin-content_right-category_list admin-content_right-product_list">
                    <h1>Danh sách hóa đơn dịch vụ </h1>

                    <form action="./servicelist_search.php" method="post" class= "form_ct form_ct-ser">
                        <div class="input-type">
                            <label for="">Tìm kiếm:</label>
                            <input type="text" name="txtsearch" value="<?php echo $searchTerm;?>">
                            <input type="submit" name="search" value="Tìm kiếm" class="btn_submit">
                        </div>
                    </form>

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
                                if ($search_serviced) {
                                    $i = 0;
                                    while ($resultS = $search_serviced -> fetch_assoc()) {
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $resultS['ser_id'];?></td>
                                <td><?php echo $resultS['ser_name'];?></td>
                                <td><?php echo $resultS['user_username'];?></td>
                                <td><?php echo $resultS['ser_diachi'];?></td>
                                <td><?php echo $resultS['ser_email'];?></td>
                                <td><?php echo $resultS['ser_sdt'];?></td>
                                <td><?php echo $resultS['ser_time'];?></td>
                                <td><?php echo $resultS['service_name'];?></td>
                                <td><?php echo $resultS['ser_info'];?></td>
                                <td><?php echo $resultS['ser_total'];?></td>
                                <td>
                                <?php
                                    // Hiển thị trạng thái dựa trên giá trị của ser_status
                                    if ($resultS['ser_status'] == 0) {
                                        echo '<a href="serviced_print.php?ser_id=' . $resultS['ser_id'] . '" style="color:#2b45f0;">Đã hoàn thành</a>';
                                    } elseif ($resultS['ser_status'] == 1) {
                                        echo '<a href="servicedupdate.php?ser_id=' . $resultS['ser_id'] . '" style="color:red;">Duyệt</a> <br><br>';
                                        echo '<a href="serviceddelete.php?ser_id=' . $resultS['ser_id'] . '" style="color:black;">Xóa</a>';
                                    }elseif ($resultS['ser_status'] == 2) {
                                        echo '<a href="servicedupdate.php?ser_id=' . $resultS['ser_id'] . '" style="color:#22c00b;">Chờ hoàn thành</a>';
                
                                    }
                                ?>
                                </td>
                            </tr>

                            <?php
                                    }
                                } else {
                            ?>
                            <tr>
                                <td colspan="12">Không có thông tin nào phù hợp!</td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>