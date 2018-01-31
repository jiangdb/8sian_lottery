<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Winners extends Model
{
    protected $table = 'winners';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'uid', 'grade'
    ];

    public function lottery_users()
    {
        return $this->belongsTo(LotteryUsers::class, 'uid');
    }
}
