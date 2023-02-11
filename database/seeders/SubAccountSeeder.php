<?php

namespace Database\Seeders;

use App\Models\SubAccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = [
            [
                'name' => 'Individual Loans',
                'amount'=>'0.00',
                'account_id' => 1,
            ],
            [
                'name' => 'Group/Sacco Loans',
                'amount'=>'0.00',
                'account_id' => 1,
            ],
            [
                'name' => 'Loan Interests',
                'amount'=>'0.00',
                'account_id' => 2,
            ],
            [
                'name' => 'Loans Processing Fee',
                'amount'=>'0.00',
                'account_id' => 2,
            ],
            [
                'name' => 'Payroll',
                'amount'=>'0.00',
                'account_id' => 3,
            ],
            [
                'name' => 'Rent',
                'amount'=>'0.00',
                'account_id' => 3,
            ],
            [
                'name' => 'Travel Expenses.',
                'amount'=>'0.00',
                'account_id' => 3,
            ],
            [
                'name' => 'Utilities Bills.',
                'amount'=>'0.00',
                'account_id' => 3,
            ],
        ];
        
       
        foreach ($details as $account) {
            SubAccount::create($account);
        }
    }
}
