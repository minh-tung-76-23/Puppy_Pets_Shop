<?php
    include "header.php";
    include "slider.php";
    include "class/order_product_class.php";
?>


<?php
    $orderProduct = new OrderProduct();
    $searchTerm = isset($_POST['txtsearch']) ? $_POST['txtsearch'] : null;
    $search_order = $orderProduct -> search_order($searchTerm);
?>

            <div class="admin-content_right">
                <div class="admin-content_right-category_list admin-content_right-product_list">
                    <h1>Danh sách hóa đơn dịch vụ </h1>

                    <form action="./order_search.php" method="post" class= "form_ct form_ct-ser">
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
                                <td><b>Tên đăng nhập</b></td>
                                <td><b>Thời gian đặt</b></td>
                                <td><b>Họ tên</b></td>
                                <td><b>SĐT</b></td>
                                <td><b>Email</b></td>
                                <td><b>Địa chỉ</b></td>
                                <td><b>Chi tiết</b></td>
                                <td><b>Thành tiền</b></td>
                                <td><b>Trạng thái</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($search_order) {
                                    $i = 0;
                                    while ($resultS = $search_order -> fetch_assoc()) {
                                        $i++;
                            ?>
                            <tr>
                            <td><?php echo $i;?></td>
                                <td><?php echo $resultS['order_id'];?></td>
                                <td><?php echo $resultS['user_username'];?></td>
                                <td><?php echo $resultS['order_time'];?></td>
                                <td><?php echo $resultS['order_name'];?></td>
                                <td><?php echo $resultS['order_sdt'];?></td>
                                <td><?php echo $resultS['order_email'];?></td>
                                <td><?php echo $resultS['order_address'];?></td>
                                <td><a href="order_details.php?id=<?php echo $resultS['order_id'];?>"><p>Xem chi tiết</p></a></td>
                                <td><?php echo number_format($resultS['order_product_price'], 0, ',', '.') . '₫';?></td>
                                <td>
                                <?php
                                    // Hiển thị trạng thái dựa trên giá trị của ser_status
                                    if ($resultS['order_status'] == 1) {
                                        echo '<a href="serviced_print.php?order_id=' . $resultS['order_id'] . '" style="color:#2b45f0;">Đã hoàn thành</a>';
                                    } elseif ($resultS['order_status'] == 0) {
                                        echo '<a href="order_update.php?order_id=' . $resultS['order_id'] . '" style="color:red;">Duyệt</a>';
                                    }elseif ($resultS['order_status'] == 2) {
                                        echo '<a href="order_update.php?order_id=' . $resultS['order_id'] . '" style="color:#22c00b;">Chờ giao hàng</a>';
                                    }
                                ?><br><br>
                                    <a href="serviceddelete.php?order_id=<?php echo $resultS['order_id'];?>">Xóa</a>
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