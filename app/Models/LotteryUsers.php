<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotteryUsers extends Model
{
    protected $table = 'lottery_users';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'avatar'
    ];
}
