<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrizeGradeTimesIntoLotterySettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lottery_settings', function (Blueprint $table) {
            $table->tinyInteger('prize_grade_times')->default(0);
        });

        Schema::table('winners', function (Blueprint $table) {
            $table->tinyInteger('grade_times')->default(0)->after('grade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lottery_settings', function (Blueprint $table) {
            $table->dropColumn('prize_grade_times');
        });

        Schema::table('winners', function (Blueprint $table) {
            $table->dropColumn('grade_times');
        });
    }
}
