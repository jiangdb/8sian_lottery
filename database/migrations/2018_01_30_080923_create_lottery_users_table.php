<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->nullable()->comment('名称');
            $table->string('avatar', 150)->nullable()->comment('头像路径');
            $table->string('company', 100)->nullable()->comment('所在公司');
            $table->string('department', 100)->nullable()->comment('所在部门');
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
        Schema::dropIfExists('lottery_users');
    }
}
