<?php
    include 'database.php';
?>

<?php
    class User {
        private $db;

        public function __construct() {
            $this -> db = new Database();
        }

        public function insert_user() {
            $name = $_POST['txtName'];
            $user_address = $_POST['txtAddress'];
            $user_email = $_POST['txtEmail'];
            $user_sdt = $_POST['txtsdt'];
            $user_name = $_POST['txtusername'];
            $user_password = $_POST['txtpassword'];
            $user_role = $_POST['txtrole'];

            // Kiểm tra xem user_name đã tồn tại chưa
            $checkQuery = "SELECT user_username FROM tbl_user WHERE user_username = '$user_name'";
            $checkResult = $this->db->select($checkQuery);
            if($checkResult) {
                $_SESSION['add_error'] = 'Tên tài khoản đã tồn tại!';
            } else {
                $query = "INSERT INTO tbl_user (
                    user_name,
                    user_address,
                    user_email,
                    user_sdt,
                    user_username,
                    user_password,
                    user_role
                    ) VALUES 
                        ('$name',
                        '$user_address',
                        '$user_email',
                        '$user_sdt',
                        '$user_name',
                        '$user_password',
                        '$user_role'
                        )";
                $result = $this -> db -> insert($query);
                return $result;
            }
        }

        public function show_user($user) {
            $query = "SELECT * FROM tbl_user ORDER BY user_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        }

        public function get_user($user_id) {
            $query = "SELECT * FROM tbl_user WHERE user_id = '$user_id'"; 
            $result = $this -> db -> select($query);
            return $result;
        }

        public function update_user($user_id) {
            $name = $_POST['txtName'];
            $user_address = $_POST['txtAddress'];
            $user_email = $_POST['txtEmail'];
            $user_sdt = $_POST['txtsdt'];
            $user_name = $_POST['txtusername'];
            $user_password = $_POST['txtpassword'];
            $user_role = $_POST['txtrole'];
            $query = "UPDATE tbl_user 
                SET user_name = '$name',
                    user_address = '$user_address',
                    user_email = '$user_email',
                    user_sdt = '$user_sdt',
                    user_username = '$user_name',
                    user_password = '$user_password',
                    user_role = '$user_role'
                WHERE user_id = '$user_id'";
            $result = $this -> db -> update($query);
            header("Location: userlist.php");
            return $result;
        }

        public function delete_user($user_id) {
            $query = "DELETE FROM tbl_user WHERE user_id = '$user_id'";
            $result = $this -> db -> delete($query);
            header("Location: userlist.php");
            return $result;
        }
    }
?>