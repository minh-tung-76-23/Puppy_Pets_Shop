<?php
    include "header.php";
    include "slider.php";
    include "class/user_class.php";
?>

<?php
    $user = new User();
    $user_id = $_GET["user_id"];

    $get_user = $user -> get_user($user_id);

    if ($get_user) {
        $resultA = $get_user -> fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $update_user = $user -> update_user($user_id, $_POST);
    }
?>

        <div class="admin-content_right">
            <div class="admin-content_right-category_add">
                <h1>Thêm Tài Khoản</h1>
                <form action="" method="post" class="form_ct">
                    <div class="input-type">
                        <label for="">Họ tên</label>
                        <input type="text" name="txtName" value="<?php echo $resultA['user_name']?>" required>
                    </div>

                    <div class="input-type">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="txtAddress" value="<?php echo $resultA['user_address']?>" required>
                    </div>

                    <div class="input-type">
                        <label for="">Email</label>
                        <input type="text" name="txtEmail" value="<?php echo $resultA['user_email']?>" required >
                    </div>


                    <div class="input-type">
                        <label for="">SDT</label>
                        <input type="text" name="txtsdt" value="<?php echo $resultA['user_sdt']?>" required >
                    </div>

                    <div class="input-type">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="txtusername" value="<?php echo $resultA['user_username']?>" required>
                    </div>

                    <div class="input-type">
                        <label for="">Mật khẩu</label>
                        <input type="text" name="txtpassword" value="<?php echo $resultA['user_password']?>" required>
                    </div>

                    <div class="input-type">
                        <label for="">Phân quyền</label>
                        <select name="txtrole">
                            <option value="0" <?php echo ($resultA['user_role'] == 0) ? 'selected' : ''; ?>>Người dùng</option>
                            <option value="1" <?php echo ($resultA['user_role'] == 1) ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                    <?php
                        if (isset($_SESSION['add_error'])) {
                            
                    ?>
                    <p style="color: red; padding-top:6px; padding-left:30%;font-size:14px;"><?php echo $_SESSION['add_error'];?></p>
                    <?php
                            unset($_SESSION['add_error']); 
                        }
                    ?>
                    <input type="submit" name="submit" value="Sửa thông tin" class="btn_submit" >
                </form>
            </div>
        </div
    </section>
    </body>
</html>