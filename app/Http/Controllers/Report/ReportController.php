<?php

namespace App\Http\Controllers\Report;

use PDF;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Route;
use App\Http\Services\PrintPdf;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function borrowerStatement(PrintPdf $pdf,$id,Request $request){
        #client Details
        $client=Borrower::find($request->segment(3));
        
        # Print Header Here
        $pdf->header();
        PDF::AddPage();
        PDF::Ln(10);
        PDF::SetFont('helvetica', '', 15);
        PDF::Cell(189,0,'____________________________________________________________',0,0,'L',0);
        PDF::SetFont('helvetica', 'B', 12);
        PDF::Ln(10);
        PDF::SetTextColor(72,35,102);
        PDF::Cell(0,6,'CLIENT LOAN STATEMENT',0,1,'C');
        PDF::SetTextColor(0,0,0);
        $this->clientHeader($client,'Account Transactions');
        PDF::SetTextColor(72,35,102);
        PDF::Cell(35,6,'Statement Transactions.',0,1,'L');
        PDF::SetTextColor(0,0,0);
        PDF::Ln(5);

        # Statement Fields
        PDF::SetFont('helvetica', 'B', 8);
        PDF::SetFillColor(72,35,102);
        PDF::SetTextColor(255,255,255);
        PDF::SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(247,247, 247)));
        PDF::Cell(23,8,'Loan No.',1,0,'C',1);
        PDF::Cell(40,8,'Details',1,0,'C',1);
        PDF::Cell(20,8,'Amount',1,0,'C',1);
        PDF::Cell(20,8,'Interest',1,0,'C',1);
        PDF::Cell(20,8,'Total',1,0,'C',1);
        PDF::Cell(20,8,'Paid',1,0,'C',1);
        PDF::Cell(20,8,'Balance',1,0,'D',1);
        PDF::Cell(25,8,'Date',1,0,'C',1);
        PDF::Ln(7);
        PDF::SetFillColor(255, 255, 255);
        PDF::SetFont('helvetica', '', 7);
        PDF::SetTextColor(0,0,0);

        #Statement Looping
        $amount=0;
        $interest=0;
        $total=0;
        $paid=0;
        $balance=0;

        $total_issued=0;
        $total_paid=0;
        

        foreach ($client->loan()->get() as $key => $value) {
            foreach ($value->statement()->get() as $key => $item) {
                PDF::Cell(23,6,$value->transaction_code,1,0,'C',1);
                PDF::Cell(40,6,$item->action,1,0,'L',1);
                PDF::Cell(20,6,number_format($item->amount,2),1,0,'R',1);
                #interest
                if($item->action=='Loan Application Approved' || $item->action=='Loan Topup Reconcilliation '){
                    PDF::Cell(20,6,number_format($value->interest,2),1,0,'R',1);
                    $interest+=(float) $value->interest;
                }else{
                    PDF::Cell(20,6,'0.00',1,0,'R',1);
                }
                #Total
                if($item->action=='Loan Application Approved' || $item->action=='Loan Topup Reconcilliation '){
                    PDF::Cell(20,6,number_format($value->total,2),1,0,'R',1);
                    $total_issued+=(float) $value->total;
                    $total+=(float) $value->total;
                }else{
                    PDF::Cell(20,6,number_format($item->amount,2),1,0,'R',1);
                    $total+=(float) $item->amount;
                }
                #paid
                if($item->action=='Loan Application Approved' || $item->action=='Loan Topup Reconcilliation '){
                    PDF::Cell(20,6,'0.00',1,0,'R',1);
                }else{
                    PDF::Cell(20,6,number_format($item->amount,2),1,0,'R',1);
                    $paid+=(float) $item->amount;
                }

                $amount+=(float) $item->amount;
                PDF::Cell(20,6,number_format($item->balance,2),1,0,'R',1);
                $balance+=(float) $item->balance;
                PDF::Cell(25,6,$item->date,1,0,'R',1);
                PDF::Ln(6);
               
            }
        }

        #Totals
        PDF::SetFont('helvetica', 'B', 7);
        PDF::Cell(63,6,'TOTAL.',1,0,'C',1);
        
        PDF::Cell(20,6,number_format($amount,2),1,0,'R',1);
        PDF::Cell(20,6,number_format($interest,2),1,0,'R',1);
        PDF::Cell(20,6,number_format($total,2),1,0,'R',1);
        PDF::Cell(20,6,number_format($paid,2),1,0,'R',1);
        //PDF::Cell(20,6,number_format($item->balance,2),1,0,'C',1);
       
        PDF::Ln(6);

        PDF::SetFont('helvetica', '', 15);
        PDF::Cell(189,0,'_______________________________________________________________',0,0,'L',0);
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Ln(15);
        PDF::SetTextColor(72,35,102);
        PDF::Cell(130,6,'Transaction Summary.',0,0,'L');
        PDF::Cell(35,6,'Current Loan Summary.',0,0,'L');
        PDF::SetTextColor(0,0,0);
        PDF::Ln(7);

        #SUmmary
        PDF::SetFont('helvetica', '', 9);
        PDF::Cell(30,6,'Total Loan Issued: ',0,0,'L');
        PDF::Cell(100,6,number_format($total_issued,2),0,0,'L',0);
        PDF::Cell(25,6,'Loan Amount: ',0,0,'L',0);
        PDF::Cell(20,6,number_format($client->loan->last()?$client->loan->last()->first()->total:0,2),0,0,'L',0);
        
        PDF::Ln(6);
        PDF::Cell(30,6,'Total Repayment: ',0,0,'L',0);
        PDF::Cell(100,6,number_format($paid,2),0,0,'L',0);
        PDF::Cell(26,6,'Currect Balance: ',0,0,'L',0);
        PDF::Cell(20,6,number_format($client->loan->last()?$client->loan->last()->first()->statement()->latest()->first()->amount:0,2),0,0,'L',0);



    
        PDF::Cell(189,6,'',0,0,'L',0);
        PDF::setFooterCallback(function($pdf) {
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });

        //Close and output PDF document
        PDF::Output('statement.pdf', 'I');
    }
    public function clientHeader($client,$title){
        #Client Statement Title
        PDF::Ln(4);
        PDF::SetFont('helvetica', 'B', 9);
        PDF::Cell(35,6,$title,0,1,'L');
        PDF::SetFont('helvetica', '', 9);

        #Client Details
        
        PDF::Cell(20,6,'Borrower: ',0,0,'L',0);
        PDF::Cell(100,6,$client->fullname(),0,0,'L',0);
        
        PDF::SetFont('helvetica', 'B', 9);
        
        PDF::Cell(35,6,'Branch Information ',0,1,'L',0);
        PDF::SetFont('helvetica', '', 9);
        PDF::Cell(20,6,'Mobile No: ',0,0,'L',0);
        PDF::Cell(100,6,'+254 '.$client->mobile,0,0,'L',0);
        PDF::Cell(25,6,'Client Branch: ',0,0,'L',0);
        PDF::Cell(20,6,$client->officer->branch->name,0,0,'L',0);
        
        PDF::Ln(6);
        PDF::Cell(20,6,'National Id: ',0,0,'L',0);
        PDF::Cell(100,6,$client->id_number,0,0,'L',0);
        PDF::Cell(25,6,'Loan Officer: ',0,0,'L',0);
        PDF::Cell(20,6,$client->officer->name,0,0,'L',0);

        PDF::Ln(8);

        PDF::SetFont('helvetica', '', 15);
        PDF::Cell(189,0,'_______________________________________________________________',0,0,'L',0);
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Ln(8);
    }
}
