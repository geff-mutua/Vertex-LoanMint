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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrower_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('posted_by')->nullable();
            $table->string('reference_code');
            $table->string('transaction_type');
            $table->integer('amount');
            $table->string('msisdn');
            $table->date('date');
            $table->string('payment_option');
            $table->string('subaccount_id')->nullable();
            $table->string('account_id')->nullable();
            $table->foreignId('loan_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('status')->default(0); //0=>unapproved 1=Approved 2=Rejected
            $table->string('business_balance')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
