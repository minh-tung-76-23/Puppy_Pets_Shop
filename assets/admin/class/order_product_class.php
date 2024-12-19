<?php
    include 'database.php';
?>

<?php
    class OrderProduct {
        private $db;

        public function __construct() {
            $this -> db = new Database();
        }

        public function show_order($orderProduct) {
            $query = "SELECT tbl_order_product.*, tbl_user.user_username 
            FROM tbl_order_product 
            LEFT JOIN tbl_user ON tbl_order_product.order_user_id = tbl_user.user_id
            ORDER BY tbl_order_product.order_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        }      
        
        public function show_order_complete() {
            $query = "SELECT tbl_order_product.*, tbl_user.user_username 
            FROM tbl_order_product 
            LEFT JOIN tbl_user ON tbl_order_product.order_user_id = tbl_user.user_id
            WHERE tbl_order_product.order_status = 1
            ORDER BY tbl_order_product.order_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        }        

        public function delete_order($ser_id) {
            $query = "DELETE FROM tbl_order_product WHERE order_id = '$ser_id'";
            $result = $this -> db -> delete($query);
            header("Location: servicelist_register.php");
            return $result;
        }

        public function update_order($order_id) {
            // Lấy thông tin của dịch vụ cần cập nhật
            $ser_information = $this->get_order($order_id)->fetch_assoc();
        
            // Lấy giá trị trạng thái của dịch vụ từ dữ liệu đã truy xuất
            $order_status = $ser_information['order_status'];
            if($order_status == '0') {
                $query = "UPDATE tbl_order_product SET order_status = 2 WHERE order_id = '$order_id'";
                $result = $this->db->update($query);

                return $result;

            }  elseif ($order_status == '2') {
                $query = "UPDATE tbl_order_product SET order_status = 1 WHERE order_id = '$order_id'";
                $result = $this->db->update($query);
            
                // Nếu cập nhật thành công, thực hiện cập nhật thông tin trong bảng tbl_thongke
                if ($result) {
                    $ngaydat = $ser_information['order_time'];
        
                    // Loại bỏ các ký tự không phải số từ chuỗi
                    $doanhthu = preg_replace("/[^0-9]/", "", $ser_information['order_product_price']);
        
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

        public function count_ordered() {
            $query = "SELECT COUNT(*) as count_total FROM tbl_order_product WHERE order_status = '1'";
            $result = $this->db->select($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['count_total'];
            } else {
                return 0;
            }
            return $result;
        }

        public function count_order() {
            $query = "SELECT COUNT(*) as count_total FROM tbl_order_product WHERE order_status = '0' OR order_status = '2'";
            $result = $this->db->select($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['count_total'];
            } else {
                return 0;
            }
            return $result;
        }

        public function get_order($order_id) {
            $query = "SELECT * FROM tbl_order_product WHERE order_id = '$order_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_order_info($serId) {
            $query = "SELECT * FROM tbl_order_product WHERE order_id = '$serId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_order_details($serId) {
            $query = "SELECT * FROM tbl_order_details WHERE order_id = '$serId'";
            $result = $this->db->select($query);
            return $result;
        }
        
        
        public function search_order($searchTerm) {
            $query = "SELECT * FROM tbl_order_product 
            INNER JOIN tbl_user ON tbl_order_product.order_user_id = tbl_user.user_id
            WHERE order_name LIKE '%$searchTerm%' 
                OR user_username LIKE '%$searchTerm%' 
                OR 	order_address LIKE '%$searchTerm%' 
                OR 	order_sdt LIKE '%$searchTerm%' 
                OR order_time LIKE '%$searchTerm%' 
                OR order_email LIKE '%$searchTerm%'";
            $resultS = $this -> db -> select($query);
            return $resultS;
        }  

        public function print_order($serId) {
            $query = "SELECT *
            FROM tbl_order_product 
            WHERE order_id = '$serId'";
            $result = $this -> db -> select($query);
            return $result;
        }

        public function print_order_details($serId) {
            $query = "SELECT * FROM tbl_order_details WHERE order_id = '$serId'";
            $result = $this -> db -> select($query);
            return $result;
        }
    }
?>