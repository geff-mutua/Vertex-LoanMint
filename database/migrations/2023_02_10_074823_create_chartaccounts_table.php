<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chartaccounts', function (Blueprint $table) {
            $table->id();
            $table->string('accountname', 50);
            $table->float('amount', 10, 0)->default(0);
            $table->string('type', 10); //Debit | Credit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chartaccounts');
    }
};
