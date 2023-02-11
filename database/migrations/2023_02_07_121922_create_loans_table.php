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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrower_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('loan_product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->float('amount',12,2);
            $table->float('interest',12,2);
            $table->float('total',12,2);
            
            $table->string('transaction_code');
            $table->boolean('disbursement_status')->default(0);
            $table->string('loan_purpose');
            $table->string('status'); # Paid, Pending, Active , Deffered;
            $table->boolean('processing_fee'); // 1=> pending Processing Fee 2=>Processing Fee Done 
            $table->timestamp('date'); // Issue Date
            $table->timestamp('due_date')->nullable();
            $table->integer('approved_by')->nullable(); //Approved By
            $table->longText('reject_reason');
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
        Schema::dropIfExists('loans');
    }
};
