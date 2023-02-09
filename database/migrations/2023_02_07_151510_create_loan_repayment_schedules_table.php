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
        Schema::create('loan_repayment_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('borrower_id')->onDelete('cascade')->onUpdate('cascade');
            $table->float('amount',12,2);
            $table->timestamp('repayment_date');
            $table->integer('loan_officer');
            $table->string('status');//Paid,Due,Arrears;
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
        Schema::dropIfExists('loan_repayment_schedules');
    }
};
