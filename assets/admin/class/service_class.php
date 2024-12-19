<?php
    include 'database.php';
?>

<?php
    class Service {
        private $db;

        public function __construct() {
            $this -> db = new Database();
        }

        public function show_service($service) {
            $query = "SELECT * FROM tbl_service ORDER BY service_id DESC"; 
            $result = $this -> db -> select($query);
            return $result;
        }
    }
?>