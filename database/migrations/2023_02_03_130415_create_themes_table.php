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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->boolean('menuFixed')->default(0);
            $table->boolean('navbarFixed')->default(1);
            $table->boolean('footerFixed')->default(1);
            $table->boolean('menuCollapsed')->default(1);
            $table->string('myStyle')->default('light');
            $table->string('myLayout')->default('vertical');
            $table->string('myTheme')->default('theme-semi-dark');
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
        Schema::dropIfExists('themes');
    }
};
