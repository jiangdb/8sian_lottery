<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePrizeGradeTypeIntoLotterySettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lottery_settings', function (Blueprint $table) {
            $table->dropColumn('prize_grade');
        });

        Schema::table('lottery_settings', function (Blueprint $table) {
            $table->string('prize_grade', 60)->nullable();
        });

        Schema::table('winners', function (Blueprint $table) {
            $table->dropColumn('grade');
        });

        Schema::table('winners', function (Blueprint $table) {
            $table->string('grade', 60)->nullable()->after('uid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
