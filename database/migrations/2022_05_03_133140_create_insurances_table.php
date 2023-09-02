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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('amount', 30)->nullable();
            $table->string('min_amount', 30)->nullable();
            $table->string('increase_percent', 50)->nullable();
            $table->string('betting_percent', 50)->nullable();
            $table->string('withdrawal_discount', 30)->nullable();
            $table->string('credit_time', 50)->nullable();
            $table->string('description')->nullable();
            $table->string('expired_time', 50)->nullable();
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
        Schema::dropIfExists('insurances');
    }
};
