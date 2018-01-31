<?php

namespace App\Http\Controllers;

use App\Models\LotterySettings;
use App\Models\Winners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LotteryController extends Controller
{
    public function checkIfStart()
    {
        $settings = LotterySettings::find(1);
        $result['status'] = 0;
        if (!empty($settings) && $settings->lottery_status) {
            $result['status'] = 1;
        }
        return response()->json($result);
    }

    public function setStart(Request $request)
    {
        $settings = LotterySettings::find($request->id);
        $settings->lottery_status = 1;
        $settings->save();
        return redirect(route('lottery.setting'));
    }

    public function setStop(Request $request)
    {
        $settings = LotterySettings::find($request->id);
        $settings->lottery_status = 0;
        $settings->save();
        return redirect(route('lottery.setting'));
    }

    public function currentWinners(Request $request)
    {
        $request->grade = 1;
        $winners = Winners::with('lottery_users')->where('grade', $request->grade)->get();
        $result['status'] = 'succ';
        $result['winners'] = $winners;
        return response()->json($result);
    }

    public function setting()
    {
        $settings = LotterySettings::find(1);
        return view('settings', compact('settings'));
    }

    public function storeSetting(Request $request)
    {
        $settings = LotterySettings::find($request->id);
        if ($settings == null) {
            LotterySettings::create([
                'winners_count' => $request->winners_count
            ]);
        } else {
            $settings->winners_count = $request->winners_count;
            $settings->save();
        }
        return redirect(route('lottery.setting'));
    }
}
