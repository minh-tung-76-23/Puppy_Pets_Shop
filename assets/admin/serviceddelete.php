<?php
    include "class/serviced_class.php";
    $serviced = new Serviced();
    // if (!isset($_GET["category_id"]) || ($_GET["category_id"]) == NULL) {
    //     echo "<script>window.location = 'categorylist.php' </script>";
    // } else {
        $ser_id = $_GET['ser_id'];
    // }

    $delete_seviced = $serviced -> delete_serviced($ser_id);

?>