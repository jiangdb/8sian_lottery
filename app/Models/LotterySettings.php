<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotterySettings extends Model
{
    protected $table = 'lottery_settings';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'winners_count', 'prize_grade', 'allow_winners'
    ];
}
