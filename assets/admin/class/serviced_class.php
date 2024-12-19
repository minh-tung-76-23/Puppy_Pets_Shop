<?php
    include 'database.php';
?>

<?php
    class Serviced {
        private $db;

        public function __construct() {
            $this -> db = new Database();
        }

        public function show_serviced($serviced) {
            $query = "SELECT tbl_service_register.*, tbl_service.service_name, tbl_user.user_username 
            FROM tbl_service_register 
            LEFT JOIN tbl_service ON tbl_service_register.service_id = tbl_service.service_id
            LEFT JOIN tbl_user ON tbl_service_register.user_id = tbl_user.user_id
            ORDER BY tbl_service_register.ser_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        } 
        
        public function show_serviced_complete() {
            $query = "SELECT tbl_service_register.*, tbl_service.service_name, tbl_user.user_username 
            FROM tbl_service_register 
            LEFT JOIN tbl_service ON tbl_service_register.service_id = tbl_service.service_id
            LEFT JOIN tbl_user ON tbl_service_register.user_id = tbl_user.user_id
            WHERE ser_status = 0
            ORDER BY tbl_service_register.ser_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        }    

        public function delete_serviced($ser_id) {
            $query = "DELETE FROM tbl_service_register WHERE ser_id = '$ser_id'";
            $result = $this -> db -> delete($query);
            header("Location: servicelist_register.php");
            return $result;
        }

        public function update_serviced($ser_id) {
            // Lấy thông tin của dịch vụ cần cập nhật
            $ser_information = $this->get_serviced($ser_id)->fetch_assoc();
        
            // Lấy giá trị trạng thái của dịch vụ từ dữ liệu đã truy xuất
            $ser_status = $ser_information['ser_status'];
            if($ser_status == '1') {
                $query = "UPDATE tbl_service_register SET ser_status = 2 WHERE ser_id = '$ser_id'";
                $result = $this->db->update($query);

                return $result;

            }  elseif ($ser_status == '2') {
                $query = "UPDATE tbl_service_register SET ser_status = 0 WHERE ser_id = '$ser_id'";
                $result = $this->db->update($query);
            
                // Nếu cập nhật thành công, thực hiện cập nhật thông tin trong bảng tbl_thongke
                if ($result) {
                    $ngaydat = $ser_information['ser_time'];
        
                    // Loại bỏ các ký tự không phải số từ chuỗi
                    $doanhthu = preg_replace("/[^0-9]/", "", $ser_information['ser_total']);
        
                    // Chuyển đổi giá trị thành số
                    $doanhthu = floatval($doanhthu);
            
                    // Kiểm tra xem có bản ghi nào trong tbl_thongke có ngày trùng với ngày đăng ký hay không
                    $sql_check_existing_record = "SELECT * FROM tbl_thongke WHERE ngaydat = '$ngaydat'";
                    $result_check_existing_record = $this->db->select($sql_check_existing_record);
            
                    if ($result_check_existing_record && $result_check_existing_record->num_rows > 0) {
                        // Nếu có bản ghi, thực hiện cập nhật giá trị cột soluongdon và doanhthu
                        $sql_update_thongke = "UPDATE tbl_thongke 
                                               SET soluongdon = soluongdon + 1,
                                                   doanhthu = doanhthu + $doanhthu
                                               WHERE ngaydat = '$ngaydat'";
                        $this->db->update($sql_update_thongke);
                    }
                }
                return $result;
            }
            
        }        

        public function count_service() {
            $query = "SELECT COUNT(*) as count_total FROM tbl_service_register WHERE ser_status = '0'";
            $result = $this->db->select($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['count_total'];
            } else {
                return 0;
            }
            return $result;
        }

        public function count_serviced() {
            $query = "SELECT COUNT(*) as count_total FROM tbl_service_register WHERE ser_status = '1' OR ser_status = '2'";
            $result = $this->db->select($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['count_total'];
            } else {
                return 0;
            }
            return $result;
        }

        public function get_serviced($ser_id) {
            $query = "SELECT * FROM tbl_service_register WHERE ser_id = '$ser_id'";
            $result = $this->db->select($query);
            return $result;
        }
        
        

        public function search_serviced($searchTerm) {
            $query = "SELECT * FROM tbl_service_register 
            INNER JOIN tbl_service ON tbl_service_register.service_id = tbl_service.service_id
            INNER JOIN tbl_user ON tbl_service_register.user_id = tbl_user.user_id
            WHERE ser_name LIKE '%$searchTerm%' 
                OR user_username LIKE '%$searchTerm%' 
                OR ser_diachi LIKE '%$searchTerm%' 
                OR ser_sdt LIKE '%$searchTerm%' 
                OR ser_time LIKE '%$searchTerm%' 
                OR service_name LIKE '%$searchTerm%'";
            $resultS = $this -> db -> select($query);
            return $resultS;
        }  

        public function print_serviced($serId) {
            $query = "SELECT tbl_service_register.*, tbl_service.service_name
            FROM tbl_service_register 
            INNER JOIN tbl_service ON tbl_service_register.service_id = tbl_service.service_id 
            WHERE ser_id = '$serId'";
            $result = $this -> db -> select($query);
            return $result;
        }
    }
?>