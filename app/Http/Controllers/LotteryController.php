<?php

namespace App\Http\Controllers;

use App\Models\LotterySettings;
use App\Models\LotteryUsers;
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
            $result['count'] = $settings->winners_count;
        } else {
            $winners = Winners::with('lottery_users')->where('grade', $settings->prize_grade)->get()->pluck('uid');
            $result['winners'] = $winners;
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

        if ($settings->allow_winners) {
            $users = LotteryUsers::all();
        } else {
            $users = LotteryUsers::whereRaw('id NOT IN (SELECT uid FROM winners)')->get();
        }
        $random_ids = array_random($users->pluck('id')->toArray(), $settings->winners_count);
        foreach ($random_ids as $id) {
            Winners::create([
                'uid' => $id,
                'grade' => $settings->prize_grade
            ]);
        }

        $settings->lottery_status = 0;
        $settings->save();
        return redirect(route('lottery.setting'));
    }

    public function winners()
    {
        $winners = Winners::with('lottery_users')->get();
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
        $allow_winners = $request->allow_winners ?? 0;
        if ($settings == null) {
            LotterySettings::create([
                'winners_count' => $request->winners_count,
                'prize_grade' => $request->prize_grade,
                'allow_winners' => $allow_winners,
            ]);
        } else {
            $settings->winners_count = $request->winners_count;
            $settings->prize_grade = $request->prize_grade;
            $settings->allow_winners = $allow_winners;
            $settings->save();
        }
        return redirect(route('lottery.setting'));
    }

    public function users()
    {
        $users = LotteryUsers::all();
        $datas = array();
        foreach ($users as $user) {
            array_push($datas, [
                'name' => $user->name,
                'avatar' => $user->avatar,
                'data' => array('id' => $user->id)
            ]);
        }
        $result['status'] = 'succ';
        $result['users'] = $datas;
        return response()->json($result);
    }
}
