<?php
    include 'database.php';
?>

<?php
    class Product {
        private $db;

        public function __construct() {
            $this -> db = new Database();
        }

        
        public function show_category() {
            $query = "SELECT * FROM tbl_category ORDER BY category_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        }

        public function show_brand() {
            // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC"; 
            $query = "SELECT tbl_brand.*, tbl_category.category_name FROM tbl_brand 
            INNER JOIN tbl_category ON tbl_brand.category_id = tbl_category.category_id
            ORDER BY tbl_brand.brand_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        }
          
        public function insert_product() {

            $product_name = $_POST["product_name"];
            $category_id = $_POST["category_id"];
            $brand_id = $_POST["brand_id"];
            $product_price = $_POST["product_price"];
            $product_price_new = $_POST["product_price_new"];
            $product_des = $_POST["product_des"];
            $product_img = $_FILES["product_img"]["name"];
            move_uploaded_file($_FILES["product_img"]["tmp_name"],"uploads/".$_FILES["product_img"]["name"]);

            $query = "INSERT INTO tbl_product (
                product_name,
                category_id, 
                brand_id,
                product_price,
                product_price_new,
                product_des,
                product_img
                ) VALUES (
                    '$product_name', 
                    '$category_id', 
                    '$brand_id', 
                    '$product_price', 
                    '$product_price_new', 
                    '$product_des', 
                    '$product_img')";
            $result = $this -> db -> insert($query);

            if($result) {
                $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                $result = $this -> db -> select($query) -> fetch_assoc();
                $product_id = $result["product_id"];
                $filename = $_FILES["product_img_des"]["name"];
                $filetmp = $_FILES["product_img_des"]["tmp_name"];

                foreach($filename as $key => $val) {
                    move_uploaded_file($filetmp[$key],"uploads/".$val);
                    $query = "INSERT INTO tbl_product_img_des (product_id, product_img_des) VALUES ('$product_id','$val')";
                    $result = $this -> db -> insert($query);
                }
            }

            return $result;
        }
         
        public function show_brand_ajax($category_id) {
            // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC"; 
            $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
            $result = $this -> db -> select($query);
            return $result;
        }

        public function show_product() {
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC"; 
            // $query = "SELECT tbl_brand.*, tbl_category.category_name FROM tbl_brand 
            // INNER JOIN tbl_category ON tbl_brand.category_id = tbl_category.category_id
            // ORDER BY tbl_brand.brand_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        }

        public function get_product($product_id) {
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'"; 
            $result = $this -> db -> select($query);
            return $result;
        }

        public function update_product($product_id) {
            $product_name = $_POST["product_name"];
            $category_id = $_POST["category_id"];
            $brand_id = $_POST["brand_id"];
            $product_price = $_POST["product_price"];
            $product_price_new = $_POST["product_price_new"];
            $product_des = $_POST["product_des"];
            $product_img = $_FILES["product_img"]["name"];
            $product_img_des = $_FILES["product_img_des"]["name"];
            move_uploaded_file($_FILES["product_img"]["tmp_name"],"uploads/".$_FILES["product_img"]["name"]);
            
            $query = "UPDATE tbl_product SET 
            product_name = '$product_name', 
            category_id = '$category_id', 
            brand_id = '$brand_id', 
            product_price = '$product_price', 
            product_price_new = '$product_price_new', 
            product_des = '$product_des' " . (isset($product_img) ? ", product_img = '$product_img'" : "") . "
            WHERE product_id = '$product_id'";
             
        
            $result = $this -> db -> update($query);
            $this->updateProductImages($product_id, $product_img_des);
            header("Location: productlist.php");
            return $result;
        }

        public function updateProductImages($product_id, $product_img_des) {
            // Xóa ảnh chi tiết sản phẩm cũ
            $this->deleteProductImages($product_id);
        
            // Thêm ảnh chi tiết sản phẩm mới
            foreach ($product_img_des as $image) {
                $query = "INSERT INTO tbl_product_img_des (product_id, product_img_des) VALUES ('$product_id', '$image')";
                $this->db->insert($query);
            }
        }

        public function deleteProductImages($product_id) {
            // Xóa toàn bộ ảnh chi tiết sản phẩm theo product_id
            $query = "DELETE FROM tbl_product_img_des WHERE product_id = '$product_id'";
            $this->db->delete($query);
        }
        public function getProductImages($product_id) {
            $query = "SELECT product_img_des FROM tbl_product_img_des WHERE product_id = '$product_id'";
            $result = $this->db->select($query);
            $images = array();
            
            while ($row = $result->fetch_assoc()) {
                $images[] = $row;
            }
            
            return $images;
        }
        
        public function getProductImageDetails($product_id) {
            // Lấy danh sách ảnh chi tiết sản phẩm theo product_id
            $query = "SELECT product_img_des FROM product_img_des WHERE product_id = '$product_id'";
            $result = $this->db->select($query);
            $images = array();
        
            while ($row = $result->fetch_assoc()) {
                $images[] = $row['product_img_des'];
            }
        
            return $images;
        }

        public function delete_product($product_id) {
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this -> db -> delete($query);
            header("Location: productlist.php");
            return $result;
        }

    }
?>