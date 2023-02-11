<?php

namespace Database\Seeders;

use App\Models\Chartaccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChartaccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chartAccounts = [
            [
                'accountname' => 'Assets',
                'amount' => 0,
                'type' => 'Debit'
            ],
            [
                'accountname' => 'Liabilities',
                'amount' => 0,
                'type' => 'Credit'
            ],
            [
                'accountname' => 'Equity',
                'amount' => 0.0,
                'type' => 'Credit'
            ],
            [
                'accountname' => 'Expense',
                'amount' => 0.0,
                'type' => 'Debit'
            ],
            [
                'accountname' => 'Revenue',
                'amount' => 0.0,
                'type' => 'Credit'
            ],
        ];
        Chartaccount::truncate();
        foreach ($chartAccounts as $chartAccount) {
            Chartaccount::create($chartAccount);
        }
    }
}
