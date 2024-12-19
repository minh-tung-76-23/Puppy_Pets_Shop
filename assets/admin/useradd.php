<?php
    include "header.php";
    include "slider.php";
    include "class/user_class.php";
?>

<?php
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insert_user = $user -> insert_user($_POST);
    }
?>

        <div class="admin-content_right">
            <div class="admin-content_right-category_add">
                <h1>Thêm Tài Khoản</h1>
                <form action="" method="post" class="form_ct">
                    <div class="input-type">
                        <label for="">Họ tên</label>
                        <input type="text" name="txtName" placeholder="Nhập họ tên..." required>
                    </div>

                    <div class="input-type">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="txtAddress" placeholder="Nhập địa chỉ...." required>
                    </div>

                    <div class="input-type">
                        <label for="">Email</label>
                        <input type="text" name="txtEmail" placeholder="Nhập Email...." required >
                    </div>


                    <div class="input-type">
                        <label for="">SDT</label>
                        <input type="text" name="txtsdt" placeholder="Nhập số điện thoại...." required >
                    </div>

                    <div class="input-type">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="txtusername" placeholder="Nhập Username...." required>
                    </div>

                    <div class="input-type">
                        <label for="">Mật khẩu</label>
                        <input type="text" name="txtpassword" placeholder="Nhập Password...." required>
                    </div>

                    <div class="input-type">
                        <label for="">Phân quyền</label>
                        <select name="txtrole">
                            <option value="0">Người dùng</option>
                            <option value="1">Admin</option>
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
                    <input type="submit" name="submit" value="Thêm tài khoản" class="btn_submit" >
                </form>
            </div>
        </div>
    </section>
    </body>
</html>