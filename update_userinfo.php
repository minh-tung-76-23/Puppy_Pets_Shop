<?php
session_start();
ob_start();
include 'config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['updateinfo'])) {
    $user_id = $_POST['txtid'];
    $user_name = $_POST['txthoten'];
    $user_address = $_POST['txtdiachi'];
    $user_email = $_POST['txtemail'];
    $user_sdt = $_POST['txtsdt'];

    $sql_update = "UPDATE tbl_user SET 
    user_name = '$user_name',
    user_address = '$user_address',
    user_email = '$user_email',
    user_sdt = '$user_sdt'
    WHERE user_id = '$user_id'";

    $result = $conn->query($sql_update);

    if ($result) {
        $_SESSION['update_success'] = 'Cập nhật thông tin thành công!';
        header('location: user.php');
    }

}

ob_end_flush(); 
?>