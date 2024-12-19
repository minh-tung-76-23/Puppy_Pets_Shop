<?php

include "class/order_product_class.php";

if (isset($_POST['print'])) {

    $orderProduct = new OrderProduct();
    $show_order_complete = $orderProduct->show_order_complete();

    if ($show_order_complete) {

        require('../../tfpdf/tfpdf.php');

        // Tạo một đối tượng PDF
        $pdf = new tFPDF();
        $pdf->AddPage("0");
        $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $pdf->SetFont('DejaVu', '', 11);

        $pdf->Write(10, 'Hóa đơn đã hoàn thành:');
        $pdf->Ln(10);

        $pdf->SetFillColor(193, 229, 252);
        $width_cell = array(8, 15, 23, 23, 42, 40, 27, 25, 25, 35, 24);

        // Header của bảng
        $pdf->Cell($width_cell[0], 10, 'STT', 1, 0, 'C', true);
        $pdf->Cell($width_cell[1], 10, 'Mã đơn', 1, 0, 'C', true);
        $pdf->Cell($width_cell[2], 10, 'Họ tên', 1, 0, 'C', true);
        $pdf->Cell($width_cell[3], 10, 'Username', 1, 0, 'C', true);
        $pdf->Cell($width_cell[4], 10, 'Địa chỉ', 1, 0, 'C', true);
        $pdf->Cell($width_cell[5], 10, 'Email', 1, 0, 'C', true);
        $pdf->Cell($width_cell[6], 10, 'SDT', 1, 0, 'C', true);
        $pdf->Cell($width_cell[7], 10, 'Thời gian đặt', 1, 0, 'C', true);
        $pdf->Cell($width_cell[8], 10, 'Phương thức', 1, 0, 'C', true);
        $pdf->Cell($width_cell[9], 10, 'Ghi chú', 1, 0, 'C', true);
        $pdf->Cell($width_cell[10], 10, 'Thành tiền', 1, 1, 'C', true);

        $pdf->SetFillColor(235, 236, 236);
        $fill = false;

        $i = 0;
        while ($result = $show_order_complete->fetch_assoc()) {
            $i++;

            $pdf->Cell($width_cell[0], 10, $i, 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[1], 10, $result['order_id'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[2], 10, $result['order_name'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[3], 10, $result['user_username'], 1, 0, 'C', $fill);
            
            // Xử lý cột Địa chỉ để không bị tràn
            $address = $result['order_address'];
            $address = (strlen($address) > 23) ? substr($address, 0, 23) . "..." : $address;
            $pdf->Cell($width_cell[4], 10, $address, 1, 0, 'C', $fill);

            $pdf->Cell($width_cell[5], 10, $result['order_email'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[6], 10, $result['order_sdt'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[7], 10, $result['order_time'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[8], 10, $result['order_pay'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[9], 10, $result['order_note'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[10], 10, number_format($result['order_product_price'], 0, ',', '.') . 'đ', 1, 1, 'C', $fill);

            $fill = !$fill;
        }

        // Xuất tệp PDF
        $pdf->Output();
    }
}

?>
