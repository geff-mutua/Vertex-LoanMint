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
        Schema::create('unmapped_payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_type');
            $table->string('transaction_id');
            $table->string('transaction_time');
            $table->string('transaction_amount');
            $table->string('business_shortcode');
            $table->string('bill_ref_number');
            $table->string('invoice_number')->nullable();
            $table->string('third_party_transid')->nullable();
            $table->string('msisdn');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date');
            $table->string('org_account_bal')->nullable();
            $table->boolean('mapped')->default(0); //false;
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
        Schema::dropIfExists('unmapped_payments');
    }
};
