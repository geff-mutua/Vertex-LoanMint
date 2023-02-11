<?php

namespace Database\Seeders;

use App\Models\DetailAccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailsAccountSeeder extends Seeder
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
                'description' => 'Individual Loans',
                'chartaccount_id' => 1,
            ],
            [
                'description' => 'Group Sacco Loans',
                'chartaccount_id' => 1,
            ],
            [
                'description' => 'Office Machine',
                'chartaccount_id' =>4 ,
            ],
            [
                'description' => 'Water',
                'chartaccount_id' =>4 ,
            ],
            [
                'description' => 'Bus Fuel (Transport)',
                'chartaccount_id' =>4 ,
            ],

        ];
        
        // DetailAccount::truncate();
        foreach ($details as $account) {
            DetailAccount::create($account);
        }
    }
}
