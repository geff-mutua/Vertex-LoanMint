<?php
namespace App\Http\Services;

use App\Models\Loan;
use App\Models\Branch;
use App\Models\Borrower;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class Lms
{
    public $data = [
        'today_repayment' => 0.00,
        'today_disbursement' => 0.00,
        'total_disbursement' => 0.00,
        'total_repayment' => 0.00,
        'total_processing_fee' => 0.00,
        'today_processing_fee' => 0,
        'pending_transactions' => 0,
        'today_transactions' => [],
        'total_profit' => 0.00,
        'pending_loans' => [],
        'loan_by_branch' => '', //chart view
        'loan_chart_repayment' => '',
        'loan_balance' => 0.00,
        'total_loan_repayments' => 0.00,
        'total_active_loans' => 0.00,
        'loan_book' => 0.00,
        'arrears' => 0.00,
        'expenses' => 0.00,
        'clients' => 0,
        'groups' => 0,
        'loan_book_percent' => 0,
        'week_performance' => 0,
        'pending_disbursement'=>0,
        'recent_repayments' => [],
        'branches'=>[],
        'branch_loans'=>[]
    ];
    public $branches = [];
    public $loan_by_branches = [];

    public function adminDashboard()
    {

        #get the the total loan Repatmeny
        Transaction::all()->each(function ($item) {
            $enums = ['processing' => 'Processing Fee', 'loan_repayment' => 'Loan Repayment'];

            if ($item->transaction_type == $enums['processing']) {
                if (Carbon::parse($item->date)->format('d-m-y') == Carbon::now()->format('d-m-y')) {
                    if ($item->status == 1) {
                        (float) $this->data['today_processing_fee'] += (float) $item->amount;
                    }
                }
                if ($item->status == 1) {
                    (float) $this->data['total_processing_fee'] += (float) $item->amount;
                    // (float) $this->data['total_profit'] += (float) $item->amount;
                }
                if ($item->status == 0) {
                    (float) $this->data['pending_transactions'] += (float) $item->amount;
                }
            } else {
                # Loan Repayment 🙉
                if ($item->status == 1) {
                    // (float) $this->data['total_profit'] += (float) $item->amount;
                    if (Carbon::parse($item->date)->format('d-m-y') == Carbon::now()->format('d-m-y')) {
                        (float) $this->data['today_repayment'] += (float) $item->amount;
                        (float) $this->data['total_repayment'] += (float) $item->amount;
                    } else {
                        (float) $this->data['total_repayment'] += (float) $item->amount;
                    }
                } elseif ($item->status == 0) {
                    (float) $this->data['pending_transactions'] += (float) $item->amount;
                }
            }

            # check if the transaction is for today
            if (Carbon::parse($item->date)->format('d-m-y') == Carbon::now()->format('d-m-y')) {
                $this->data['today_transactions'][] = $item;
            }
        });

        #Branches
        $this->branches = Branch::all()->each(function ($branch) {
            $this->loan_by_branches[$branch->branch_name] = 0;
        });
        $this->data['branches']=Branch::pluck('name');
        $this->data['branch_loans']=Branch::pluck('id');
        // foreach ($branchIds as $key => $value) {
        //     $result=(string)Transaction::where('branch_id',$value)->sum('amount');
        //     array_push($this->data['branch_loans'],$result);
        // }

        // Recent Transactions
        $this->data['recent_repayments']=Transaction::orderBy('id','DESC')->take(5)->get();

        #LOANS
        Loan::all()->each(function ($value) {
            # find the total disbursements
            if ($value->status != 'Pending' && $value->status != 'Rejected') {
                if ($value->disbursement_status == 1) {
                    $this->data['total_disbursement'] += (float) $value->amount;
                }
                # Todays Disbursment
                if (Carbon::parse($value->date)->format('d-m-y') == Carbon::now()->format('d-m-y')) {
                    if ($value->disbursement_status == 1) {
                        $this->data['today_disbursement'] += (float) $value->amount;
                    }
                }
            }
            if ($value->status == 'Active') {
                # Populate the Branches
                foreach ($this->branches as $branch) {
                    if ($value->borrower->branch->id == $branch->id) {
                        (int) $this->loan_by_branches[$branch->branch_name] += (int) $value->amount;
                    }
                }
                if ($value->processing_fee == 2) {

                    # Loan Balances (Cumulatively from Active Loans)
                    (float) $this->data['loan_balance'] += (float) $value->statement()->latest()->first()->balance;
                    # Get total Active Loans
                    (float) $this->data['total_active_loans'] += (float) $value->amount;
                    # Get the payment made on the active loan (to get the total loan repayments)

                    (float) $this->data['total_loan_repayments'] += (float) $value->statement()->whereAction('Loan Repayment')->sum('amount');

                    # TODO get loans in arrears
                    if (Carbon::now()->format('d-m-y') > Carbon::parse($value->due_date)->format('d-m-y')) {
                        if ($value->status == "Active") { //Change Logic
                            (float) $this->data['arrears'] += (float) $value->statement()->latest()->first()->balance;
                        }
                    }

                }
            } elseif ($value->status == "Pending") {
                $this->data['pending_loans'][] = $value;
            } elseif ($value->status == 'Paid') {
                (float) $this->data['total_profit'] += (float) $value->interest;
            }
        });

        # Loan Book (Total Active Loans againts Repayments)
        $this->data['loan_book'] = (float) $this->data['total_active_loans'] - (float) $this->data['total_loan_repayments'];

        if (count($this->loan_by_branches) > 0) {
            foreach ($this->loan_by_branches as $key => $value) {
                $this->data['loan_by_branch'] .= "['" . $key . "' , " . $value . "],";
            }
        }
        // Loans Pending Disbursements
        $this->data['pending_disbursement']=(int)Loan::where('status','Pending')->where('disbursement_status','0')->sum('total');

        #fill loan chart percentage on repayment
        $this->data['loan_chart_repayment'] .= "['Total Repayments' , " . (int) $this->data['total_repayment'] . "],";
        $this->data['loan_chart_repayment'] .= "['Total Loans' , " . (int) $this->data['total_disbursement'] . "],";

        // Get Total Borrowers
        $this->data['clients']=Borrower::count();

        //Get the Total LoanBook Percentage
        $this->data['loan_book_percent']=number_format((int)$this->data['loan_book']/(int)$this->data['total_disbursement'] * 100);

        //Week Summary
        $weekMap = [
            1 => 'MO',
            2 => 'TU',
            3 => 'WE',
            4 => 'TH',
            5 => 'FR',
            6 => 'SA',
            7 => 'SU',
        ];
        //Loop For ALL
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        if($dayOfTheWeek !==1){
            $weekMap[1]=(int)Transaction::where('date', Carbon::now()->subDays($dayOfTheWeek-1)->toDateString())->where('status','1')->sum('amount');
           
        }if($dayOfTheWeek !==2){
            $weekMap[2]=(int)Transaction::where('date', Carbon::now()->subDays($dayOfTheWeek-2)->toDateString())->where('status','1')->sum('amount');
        }if($dayOfTheWeek !==3){
            $weekMap[3]=(int)Transaction::where('date', Carbon::now()->subDays($dayOfTheWeek-3)->toDateString())->where('status','1')->sum('amount');
        }if($dayOfTheWeek !==4){
            $weekMap[4]=(int)Transaction::where('date', Carbon::now()->subDays($dayOfTheWeek-4)->toDateString())->where('status','1')->sum('amount');
        }if($dayOfTheWeek !==5){
            $weekMap[5]=(int)Transaction::where('date', Carbon::now()->subDays($dayOfTheWeek-5)->toDateString())->where('status','1')->sum('amount');
        }if($dayOfTheWeek !==6){
            $weekMap[6]=(int)Transaction::where('date', Carbon::now()->subDays($dayOfTheWeek-6)->toDateString())->where('status','1')->sum('amount');
        }if($dayOfTheWeek !==7){
            $weekMap[7]=(int)Transaction::where('date', Carbon::now()->subDays($dayOfTheWeek-7)->toDateString())->where('status','1')->sum('amount');
        }
        $weekMap[$dayOfTheWeek]=(int)Transaction::where('date', Carbon::now()->subDays($dayOfTheWeek-$dayOfTheWeek)->toDateString())->where('status','1')->sum('amount');
        $this->data['week_performance']=$weekMap;

        return $this->data;
    }
}
