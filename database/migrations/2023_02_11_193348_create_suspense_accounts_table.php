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
        Schema::create('suspense_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->float('amount',12,2);
            $table->string('reference');
            $table->integer('msisdn');
            $table->string('account_number');
            $table->string('name');
            $table->string('borrower_id')->nullable();
            $table->string('loan_id')->nullable();
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
        Schema::dropIfExists('suspense_accounts');
    }
};
