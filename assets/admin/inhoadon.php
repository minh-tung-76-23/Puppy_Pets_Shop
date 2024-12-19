<?php
    include "class/serviced_class.php";

    if(isset($_POST['print'])) {
        $serviced = new Serviced();
        $show_serviced = $serviced->show_serviced_complete();
        if($show_serviced) {
            require('../../tfpdf/tfpdf.php');

            // Tạo một đối tượng PDF
            $pdf = new tFPDF();
            $pdf->AddPage("0");
            $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $pdf->SetFont('DejaVu','',11);

            $pdf->Write(10,'Hóa đơn của bạn:');
            $pdf->Ln(10);

            $pdf->SetFillColor(193,229,252); 
            $width_cell=array(8,15,23,23,23,40,27,25,48,35,20);

            $pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
            $pdf->Cell($width_cell[1],10,'Mã đơn',1,0,'C',true);
            $pdf->Cell($width_cell[2],10,'Họ tên',1,0,'C',true);
            $pdf->Cell($width_cell[3],10,'Username',1,0,'C',true);
            $pdf->Cell($width_cell[4],10,'Địa chỉ',1,0,'C',true); 
            $pdf->Cell($width_cell[5],10,'Email',1,0,'C',true);
            $pdf->Cell($width_cell[6],10,'SDT',1,0,'C',true); 
            $pdf->Cell($width_cell[7],10,'Thời gian đặt',1,0,'C',true); 
            $pdf->Cell($width_cell[8],10,'Dịch vụ',1,0,'C',true); 
            $pdf->Cell($width_cell[9],10,'Chi tiết',1,0,'C',true); 
            $pdf->Cell($width_cell[10],10,'Thành tiền',1,1,'C',true); 
            $pdf->SetFillColor(235,236,236); 
            $fill=false;

            $i = 0;
            while($result = $show_serviced -> fetch_assoc()){
                $i++;
                $pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
                $pdf->Cell($width_cell[1],10,$result['ser_id'],1,0,'C',$fill);
                $pdf->Cell($width_cell[2],10,$result['ser_name'],1,0,'C',$fill);
                $pdf->Cell($width_cell[3],10,$result['user_username'],1,0,'C',$fill);
                $pdf->Cell($width_cell[4],10,$result['ser_diachi'],1,0,'C',$fill);
                $pdf->Cell($width_cell[5],10,$result['ser_email'],1,0,'C',$fill);
                $pdf->Cell($width_cell[6],10,$result['ser_sdt'],1,0,'C',$fill);
                $pdf->Cell($width_cell[7],10,$result['ser_time'],1,0,'C',$fill);
                $pdf->Cell($width_cell[8],10,$result['service_name'],1,0,'C',$fill);
                $pdf->Cell($width_cell[9],10,$result['ser_info'],1,0,'C',$fill);
                $pdf->Cell($width_cell[10],10,$result['ser_total'],1,1,'C',$fill);
                // $pdf->Cell($width_cell[5],10,number_format($result['soluongmua']*$result['giasp'],1,1,'C',$fill);
                $fill = !$fill;
            }

            // Xuất tệp PDF
            $pdf->Output();
        }
    }
?>
