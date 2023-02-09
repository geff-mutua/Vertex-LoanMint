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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade'); // Loa Officer
            $table->string('first_name');
            $table->string('last_name');
            $table->string('marital_status');
            $table->string('id_number');
            $table->string('address');
            $table->integer('mobile');
            $table->timestamp('date_of_birth');
            $table->string('code');
            $table->string('town');
            $table->string('residence_address');
            $table->string('education_level');
            $table->string('residence_type');
            $table->string('borrower_passport');
            $table->string('borrower_id_photo');
            $table->boolean('status')->default('0');// approved /pending
            
            $table->string('spouse_naid')->nullable();
            $table->string('spouse')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('borrower_spouse_id_photo')->nullable();
            $table->string('borrower_spouse_passport')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_location')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('net_income')->nullable();
            $table->string('monthly_expenses')->nullable();
            $table->string('monthly_household_expenses')->nullable();
            $table->string('business_type_trade')->nullable();
            $table->string('business_type_others')->nullable();
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
        Schema::dropIfExists('borrowers');
    }
};
