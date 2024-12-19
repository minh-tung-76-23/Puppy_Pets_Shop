<?php
    include "class/serviced_class.php";
    $serviced = new Serviced();
    $serId = isset($_GET['ser_id']) ? $_GET['ser_id'] : null;
    $print_serviced = $serviced->print_serviced($serId);

    if ($print_serviced) {
        $result = $print_serviced->fetch_assoc();
        require('../../tfpdf/tfpdf.php');

        // Tạo một đối tượng PDF
        $pdf = new tFPDF();
        $pdf->AddPage("0");
        $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $pdf->SetFont('DejaVu','',14);

        $pdf->SetY(50); 
        $pdf->SetX(110);
        $pdf->Write(10,'---------- Hóa đơn của bạn ----------');
        $pdf->Ln(10);

        // Column: Customer Information
        $pdf->Cell(0, 10, 'Thông tin khách hàng:', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Mã hóa đơn: ' . $result['ser_id'], 0, 1, 'C');
        $pdf->Cell(0, 10, 'Họ tên khách hàng: ' . $result['ser_name'], 0, 1, 'C');
        $pdf->Cell(0, 10, 'Địa chỉ: ' . $result['ser_diachi'], 0, 1, 'C');
        $pdf->Cell(0, 10, 'Số điện thoại: ' . $result['ser_sdt'], 0, 1, 'C');
        $pdf->Cell(0, 10, 'Email: ' . $result['ser_email'], 0, 1, 'C');
        $pdf->Cell(0, 10, 'Thời gian đặt: ' . $result['ser_time'], 0, 1, 'C');
        $pdf->Cell(0, 10, 'Dịch vụ: ' . $result['service_name'], 0, 1, 'C');
        $pdf->Cell(0, 10, 'Thông tin: ' . $result['ser_info'], 0, 1, 'C');
        $pdf->Cell(0, 10, 'Thành tiền: ' . $result['ser_total'], 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetX(80);
        $pdf->Write(10, 'Cảm ơn bạn đã sử dụng dịch vụ tại website của chúng tôi.');
        $pdf->Ln(10);

        // Xuất tệp PDF
        $pdf->Output();
    }
?>
