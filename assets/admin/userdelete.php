<?php
    include "class/user_class.php";
    $user = new User();
    // if (!isset($_GET["category_id"]) || ($_GET["category_id"]) == NULL) {
    //     echo "<script>window.location = 'categorylist.php' </script>";
    // } else {
        $user_id = $_GET['user_id'];
    // }

    $delete_user = $user -> delete_user($user_id);
?>