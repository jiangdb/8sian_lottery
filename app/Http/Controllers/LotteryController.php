<?php

namespace App\Http\Controllers;

use App\LotterySettings;
use App\Models\Winners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LotteryController extends Controller
{
    public function checkIfStart()
    {
        $settings = LotterySettings::find(1);
        $result['status'] = 0;
        if ($settings->lottery_status) {
            $result['status'] = 1;
        }
        return response()->json($result);
    }

    public function setStart()
    {
        $settings = LotterySettings::find(1);
        $settings->lottery_status = 1;
        $settings->save();
        return response()->json('ok');
    }

    public function setStop()
    {
        $settings = LotterySettings::find(1);
        $settings->lottery_status = 0;
        $settings->save();
        return response()->json('ok');
    }

    public function currentWinners(Request $request)
    {
        $winners = Winners::where('grade', $request->grade)->get();
        $result['status'] = 1;
        $result['winners'] = $winners;
        return response()->json($result);
    }
}
