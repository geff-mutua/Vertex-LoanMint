<?php
namespace App\Http\Services;

use App\Models\Company;
use PDF;

class PrintPdf{

    public function header(){
      PDF::setHeaderCallback(function($pdf) {    
        $company=Company::first();
            $image_file = K_PATH_IMAGES.'logo_example.png';
            
            $pdf->Image($image_file, 40, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $pdf->Ln(5);
            $pdf->SetFont('helvetica', 'B', 13);
            $pdf->Cell(189, 8, $company->name , 0, 1, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $pdf->Cell(189,3,$company->address,0,1,'C');
            // $pdf->Cell(189,3,'00217 Nairobi',0,1,'C');
            $pdf->Cell(189,3,'Phone: '.$company->mobile,0,1,'C');
            $pdf->Cell(189,3,'E-Mail - '.$company->email,0,1,'C');
            $pdf->SetFont('helvetica', 'B', 11);
            $pdf->Ln(2);
           
          });
        // set document information
        PDF::SetTitle(PDF_CREATOR);
        PDF::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        PDF::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        PDF::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(PDF_MARGIN_HEADER);
        PDF::SetFooterMargin(PDF_MARGIN_FOOTER);
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

    }
}