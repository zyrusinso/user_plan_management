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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100)->unique();
            $table->string('is_admin', 10)->default(0);
            $table->boolean('is_online')->default(0);
            $table->string('last_activity')->nullable();
            $table->string('credit', 15)->nullable()->default(0);
            $table->string('status', 15)->nullable();
            $table->string('cp_num', 35)->nullable();
            $table->string('plan_id')->nullable();
            $table->string('plan_amount')->nullable();
            $table->string('plan_insurance_id')->nullable();
            $table->string('insurance_amount')->nullable();
            $table->dateTime('plan_credit')->nullable();
            $table->dateTime('plan_expired')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
