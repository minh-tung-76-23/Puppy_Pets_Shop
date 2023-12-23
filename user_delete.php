
<?php
    include 'config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $serId = isset($_GET['id']) ? $_GET['id'] : null;
    $sql_serdel = "DELETE FROM tbl_service_register WHERE ser_id = '$serId'";
    $del_prdt = $conn->query($sql_serdel);

    header('location:user.php')
?>