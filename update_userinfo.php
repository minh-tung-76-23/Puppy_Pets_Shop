<?php
    session_start();
    ob_start();
    include './config.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Successfully</title>
        <link rel="stylesheet" href="./assets/css/loadstyle.css">
        <script type="text/javascript" src="assets/js/load.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <script src="sweetalert2.min.js"></script>

    </head>

    <body>
        <div class="loading" id="loading">
            <img src="https://thumbs.gfycat.com/HighCorruptIsabellineshrike-max-1mb.gif" alt="loading">
        </div>
        <?php
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
                echo <<<HTML
                <script>
                    Swal.fire({
                        title: 'Cập nhật thông tin thành công!',
                        icon: 'success', // Biểu tượng dấu tích
                        showConfirmButton: false,  // Ẩn nút xác nhận
                        timer: 2000  // Thời gian tự động đóng sau 2 giây
                    });

                    setTimeout(function() {
                        window.location.href = "user.php";
                    }, 1900);
                </script>
            HTML;
            }

        }

        ob_end_flush();
        ?>
    </body>
</html>