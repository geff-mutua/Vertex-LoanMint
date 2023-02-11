<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts=array (
            0 =>
            array (
                'name' => 'Loans',
                'amount' => 0.0,
                'chartaccount_id' => '1',               
            ),
            1 =>
            array (
                'name' => 'Interest Revenue.',
                'amount' => 0.0,
                'chartaccount_id' => '5',  
            ),
            2 =>
            array (
                'name' => 'General Expenses.',
                'amount' => 0.0,
                'chartaccount_id' => '4',  
            ),
   
        );

        Account::truncate();
        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
