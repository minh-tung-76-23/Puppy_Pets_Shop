<?php
    include 'config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $serId = isset($_GET['id']) ? $_GET['id'] : null;

    $sql_get_info = "SELECT tbl_service_register.*, tbl_service.service_name
        FROM tbl_service_register 
        INNER JOIN tbl_service ON tbl_service_register.service_id = tbl_service.service_id 
        WHERE ser_id = '$serId'";
    $result_info = $conn->query($sql_get_info);
    $row_info = $result_info->fetch_assoc();

    require('./tfpdf/tfpdf.php');

    // Tạo một đối tượng PDF
    $pdf = new tFPDF();
    $pdf->AddPage("0");
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);

    $pdf->SetY(50); 
    $pdf->SetX(110); 
    $pdf->Write(10,'---------- Hóa đơn của bạn ----------');
    $pdf->Ln(10);

    // Column 2: Customer Information
    $pdf->Cell(0, 10, 'Thông tin khách hàng:', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Mã hóa đơn: ' . $row_info['ser_id'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Họ tên khách hàng: ' . $row_info['ser_name'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Địa chỉ: ' . $row_info['ser_diachi'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Số điện thoại: ' . $row_info['ser_sdt'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Email: ' . $row_info['ser_email'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Thời gian đặt: ' . $row_info['ser_time'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Dịch vụ: ' . $row_info['service_name'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Thông tin: ' . $row_info['ser_info'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Thành tiền: ' . $row_info['ser_total'], 0, 1, 'C');

    $pdf->Ln(10);
    $pdf->SetX(80);
    $pdf->Write(10, 'Cảm ơn bạn đã sử dụng dịch vụ tại website của chúng tôi.');
    $pdf->Ln(10);

    // Xuất tệp PDF
    $pdf->Output();
?>
