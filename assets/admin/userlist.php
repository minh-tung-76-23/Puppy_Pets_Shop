<?php
    include "header.php";
    include "slider.php";
    include "class/user_class.php";
?>

<?php
    $user = new User();
    $show_user = $user -> show_user($user);
?>

            <div class="admin-content_right">
                <div class="admin-content_right-category_list">
                    <h1>Danh sách loại sản phẩm </h1>
                    <table>
                        <thead>
                            <tr>
                                    <td><b>STT</b></td>
                                    <td><b>ID</b></td>
                                    <td><b>HỌ TÊN</b></td>
                                    <td><b>ĐỊA CHỈ</b></td>
                                    <td><b>EMAIL</b></td>
                                    <td><b>SĐT</b></td>
                                    <td><b>Tên đăng nhập</b></td>
                                    <td><b>Mật khẩu</b></td>
                                    <td><b>Quyền</b></td>
                                    <td><b>TUỲ BIẾN</b></td>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($show_user) {
                                    $i = 0;
                                    while ($result = $show_user -> fetch_assoc()) {
                                        $i++;
                                        if ($result['user_role'] == 1) {
                                            $result['user_role'] = 'Admin';
                                        }  else {
                                            $result['user_role'] = 'Người dùng';
                                        }
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['user_id'];?></td>
                                <td><?php echo $result['user_name'];?></td>
                                <td><?php echo $result['user_address'];?></td>
                                <td><?php echo $result['user_email'];?></td>
                                <td><?php echo $result['user_sdt'];?></td>
                                <td><?php echo $result['user_username'];?></td>
                                <td><?php echo $result['user_password'];?></td>
                                <td><?php echo $result['user_role'];?></td>
                                <td>
                                    <a href="useredit.php?user_id=<?php echo $result['user_id'];?>">Sửa</a> |
                                    <a href="userdelete.php?user_id=<?php echo $result['user_id'];?>">Xóa</a>
                                </td>
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