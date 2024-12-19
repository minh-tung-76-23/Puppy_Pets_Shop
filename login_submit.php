<?php
session_start();
ob_start();
include 'config.php';

if (isset($_POST['login'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $role = checkuser($user_name, $password);
    echo $role;

    if ($role === '1') {
        // Nếu là tài khoản admin (user_role = 0), chuyển hướng đến trang admin.php
        header('Location:./assets/admin/thongkedoanhthu.php');
    } else if ($role === '0') {
        // Nếu là tài khoản người dùng bình thường (user_role = 1), chuyển hướng đến trang index.php
        $_SESSION['username'] = $user_name;
        header('Location: index.php');
    } else {
        // Nếu tài khoản không chính xác, hiển thị thông báo lỗi
        // echo 'Tài khoản không chính xác';
        $_SESSION['login_error'] = 'Tài khoản hoặc mật khẩu không chính xác!';
        header('Location: login.php');
    }
}

function checkuser($user_name, $password)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $user_name = $conn->real_escape_string($user_name); // Tránh SQL Injection
    $password = $conn->real_escape_string($password);

    $sql_checkuser = "SELECT * FROM tbl_user WHERE user_username = '$user_name' AND user_password = '$password'";
    $user = $conn->query($sql_checkuser);
    
    
    if ($user && $user->num_rows > 0) { 
        $row_user = $user->fetch_assoc();
        return $row_user['user_role'];
    } else {
        return false; // hoặc giá trị khác để thể hiện không tìm thấy người dùng
    }
}

ob_end_flush(); 
?>
