<?php
    include 'config.php';

    // Kết nối cơ sở dữ liệu
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Lấy order_id từ URL
    $serId = isset($_GET['id']) ? $_GET['id'] : null;

    // Truy vấn thông tin hóa đơn từ bảng tbl_order_product
    $sql_get_info = "SELECT * FROM tbl_order_product WHERE order_id = '$serId'";
    $result_info = $conn->query($sql_get_info);
    $row_info = $result_info->fetch_assoc();

    // Truy vấn thông tin chi tiết sản phẩm từ bảng tbl_order_details
    $sql_get_details = "SELECT * FROM tbl_order_details WHERE order_id = '$serId'";
    $result_order = $conn->query($sql_get_details);

    require('./tfpdf/tfpdf.php');

    // Tạo một đối tượng PDF
    $pdf = new tFPDF();
    $pdf->AddPage();

    // Thêm font DejaVu thường và in đậm (Bold)
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->AddFont('DejaVu','B','DejaVuSans-Bold.ttf',true); // Thêm font in đậm

    $pdf->SetFont('DejaVu','',12);

    // Tiêu đề hóa đơn
    $pdf->SetY(10); 
    $pdf->SetFont('DejaVu','',16);
    $pdf->Cell(0, 10, '---------- Hóa đơn của bạn ----------', 0, 1, 'C');

    // Thông tin khách hàng
    $pdf->SetFont('DejaVu','',12);
    $pdf->Ln(5);
    $pdf->Cell(0, 10, 'Thông tin khách hàng:', 0, 1, 'L');
    $pdf->Cell(0, 8, 'Mã hóa đơn: ' . $row_info['order_id'], 0, 1, 'L');
    $pdf->Cell(0, 8, 'Họ tên khách hàng: ' . $row_info['order_name'], 0, 1, 'L');
    $pdf->Cell(0, 8, 'Địa chỉ: ' . $row_info['order_address'], 0, 1, 'L');
    $pdf->Cell(0, 8, 'Số điện thoại: ' . $row_info['order_sdt'], 0, 1, 'L');
    $pdf->Cell(0, 8, 'Email: ' . $row_info['order_email'], 0, 1, 'L');
    $pdf->Cell(0, 8, 'Thời gian đặt: ' . $row_info['order_time'], 0, 1, 'L');

    $pdf->Ln(5);

    // Thông tin chi tiết sản phẩm
    $pdf->SetFont('DejaVu','',12);
    $pdf->Cell(0, 10, 'Thông tin sản phẩm:', 0, 1, 'L');

    if ($result_order->num_rows > 0) {
        $pdf->SetFont('DejaVu','',11);
        $pdf->SetFillColor(230, 230, 230);
    
        // Header của bảng
        $pdf->SetX(35); 
        $pdf->Cell(60, 10, 'Tên sản phẩm', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Số lượng', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Đơn giá', 1, 1, 'C', true);
    
        $total = 0;
    
        while ($row_order = $result_order->fetch_assoc()) {
            $product_name = $row_order['product_name'];
            $quantity = $row_order['quantity'];
            $product_price = $row_order['product_price'];
            $pdf->SetX(35); 
            // Bước 1: Tính chiều cao của cột "Tên sản phẩm"
            $pdf->SetFont('DejaVu','',11);
            $cellWidth = 60; // Chiều rộng của cột Tên sản phẩm
            $cellHeight = 10; // Chiều cao cơ bản của mỗi dòng
            $lineCount = $pdf->GetStringWidth($product_name) / $cellWidth; 
            $lineCount = ceil($lineCount); // Làm tròn lên để biết số dòng cần thiết
            $cellHeightTotal = $lineCount * 10; // Chiều cao cần thiết để chứa toàn bộ nội dung
    
            // Giữ chiều cao lớn nhất của dòng (giả sử các cột khác có chiều cao tối thiểu là 10)
            $maxHeight = max($cellHeightTotal, 10); // Đảm bảo chiều cao không nhỏ hơn 10px
    
            // Bước 2: In cột Tên sản phẩm với MultiCell (nội dung sẽ tự động xuống dòng)
            $xPos = $pdf->GetX(); // Lưu vị trí X hiện tại
            $yPos = $pdf->GetY(); // Lưu vị trí Y hiện tại
            $pdf->MultiCell($cellWidth, 10, $product_name, 1, 'C'); 
            $pdf->SetXY($xPos + $cellWidth, $yPos); // Di chuyển con trỏ để vẽ ô tiếp theo
    
            // Bước 3: In cột Số lượng và cột Đơn giá với chiều cao của cả dòng
            $pdf->Cell(40, $maxHeight, $quantity, 1, 0, 'C'); 
            $pdf->Cell(40, $maxHeight, $product_price . ' đ', 1, 1, 'C'); 
        }
    } else {
        $pdf->Cell(0, 10, 'Không có sản phẩm nào trong hóa đơn.', 0, 1, 'C');
    }
    
    
    $pdf->Ln(5);

    // Hiển thị ghi chú hóa đơn
    $pdf->Cell(0, 10, 'Ghi chú:', 0, 1, 'L');
    if (!empty($row_info) && isset($row_info['order_note'])) { 
        $order_note = $row_info['order_note'];
        if ($order_note == null || $order_note == '') {
            $pdf->Cell(0, 8, 'Không có ghi chú nào.', 0, 1, 'L');
        } else {
            $pdf->MultiCell(0, 8, $order_note, 0, 'L');
        }
    } else {
        $pdf->Cell(0, 8, 'Không có ghi chú nào.', 0, 1, 'L');
    }

    $pdf->Ln(5);

    // Thông tin tổng tiền
    $pdf->SetFont('DejaVu','B',12); 
    $pdf->Cell(0, 10, 'Tổng tiền: ' . number_format($row_info['order_product_price'], 0, ',', '.') . ' đ', 0, 1, 'R');

    $pdf->Ln(10);

    // Lời cảm ơn
    $pdf->SetFont('DejaVu','',12);
    $pdf->SetX(20);
    $pdf->Cell(0, 10, 'Cảm ơn bạn đã sử dụng dịch vụ tại website của chúng tôi.', 0, 1, 'C');

    // Xuất tệp PDF
    $pdf->Output();
?>