<?php
    include 'database.php';

    class Thongke {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function show_thongke($currentDateString, $subtractedDateString) {
            $query = "SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '$subtractedDateString' AND '$currentDateString' ORDER BY ngaydat ASC"; 
            $result = $this->db->select($query);
            return $result;
        }
    }

    // Tạo đối tượng Thongke
    $thongke = new Thongke();

    $currentDate = new DateTime();
    $subtractedDate = new DateTime();

    // Định dạng thời gian thành chuỗi "Y-m-d"
    $currentDateString = $currentDate->format('Y-m-d');

    if (isset($_POST['thoigian'])) {
        $thoigian = $_POST['thoigian'];
    } else {
        $thoigian = '';
        $subtractedDate->sub(new DateInterval('P365D'));
        $subtractedDateString = $subtractedDate->format('Y-m-d');
        
    }

    if($thoigian=='7ngay') {
        $subtractedDate->sub(new DateInterval('P7D'));
        $subtractedDateString = $subtractedDate->format('Y-m-d');
    } else if($thoigian=='28ngay') {
        $subtractedDate->sub(new DateInterval('P28D'));
        $subtractedDateString = $subtractedDate->format('Y-m-d');
    } else if($thoigian=='90ngay') {
        $subtractedDate->sub(new DateInterval('P90D'));
        $subtractedDateString = $subtractedDate->format('Y-m-d');
    } else if($thoigian=='365ngay') {
        $subtractedDate->sub(new DateInterval('P365D'));
        $subtractedDateString = $subtractedDate->format('Y-m-d');
    }

    // Lấy dữ liệu từ hàm show_thongke
    $result = $thongke->show_thongke($currentDateString, $subtractedDateString);

    // Chuyển đổi kết quả thành mảng và xuất ra JSON
    $chart_data = [];
    while ($row = $result->fetch_assoc()) {
        $chart_data[] = [
            'date' => $row['ngaydat'],
            'order' => $row['donhang'],
            'sales' => $row['doanhthu'],
            'quantity' => $row['soluongdon']
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($chart_data);
?>
