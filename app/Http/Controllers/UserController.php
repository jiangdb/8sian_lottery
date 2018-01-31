<?php

namespace App\Http\Controllers;

use App\Models\LotteryUsers;
use App\Models\Winners;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = LotteryUsers::all();
        return view('users', compact('users'));
    }

    public function setUserIfAllowLottery(Request $request)
    {
        $res = LotteryUsers::where('id', $request->id)->update(['allow_lottery' => $request->allow_lottery]);
        if ($res) {
            return response()->json('succ');
        } else {
            return response()->json('failed');
        }
    }

    public function winners()
    {
        $winners = Winners::with('lottery_users')->get();
        return view('winners', compact('winners'));
    }
}
