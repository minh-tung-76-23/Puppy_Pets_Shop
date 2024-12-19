<?php
    include "header.php";
    include "slider.php";
    include "class/service_class.php";
?>

<?php
    $service = new Service();
    $show_service = $service -> show_service($service);
?>

            <div class="admin-content_right">
                <div class="admin-content_right-category_list">
                    <h1>Danh sách dịch vụ </h1>
                    <table>
                        <thead>
                        <tr>
                                <td><b>STT</b></td>
                                <td><b>Mã dịch vụ</b></td>
                                <td><b>Tên dịch vụ</b></td>
                                <td><b>Giá</b></td>
                                <!-- <td><b>TUỲ BIẾN</b></td> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($show_service) {
                                    $i = 0;
                                    while ($result = $show_service -> fetch_assoc()) {
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['service_id'];?></td>
                                <td><?php echo $result['service_name'];?></td>
                                <td><?php echo number_format($result['service_price'], 0, ',', '.'). '₫';?></td>
                                <!-- <td>
                                    <a href="useredit.php?user_id=<?php echo $result['user_id'];?>">Sửa</a> |
                                    <a href="userdelete.php?user_id=<?php echo $result['user_id'];?>">Xóa</a>
                                </td> -->
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
    </body>
</html>