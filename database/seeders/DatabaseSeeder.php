<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AccountSeeder;
use Database\Seeders\SubAccountSeeder;
use Database\Seeders\ChartaccountSeeder;
use Database\Seeders\DetailsAccountSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Domain::factory(1)->create();
        \App\Models\User::factory(1)->create();
        
        $this->call(ChartaccountSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(SubAccountSeeder::class);
        $this->call(DetailsAccountSeeder::class);
    }
}
