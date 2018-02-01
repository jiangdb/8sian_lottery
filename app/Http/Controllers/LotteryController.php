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
        if (!empty($settings)) {
            if ($settings->lottery_status) {
                $result['status'] = 1;
                $result['count'] = $settings->winners_count;
            } else {
                $winners = Winners::with('lottery_users')
                    ->where('grade', $settings->prize_grade)
                    ->where('grade_times', $settings->prize_grade_times)
                    ->get();
                if (!empty($winners)) {
                    $card_nos = array();
                    foreach ($winners as $winner) {
                        array_push($card_nos, $winner->lottery_users->card_no);
                    }
                    $result['winners'] = $card_nos;
                } else {
                    $result['winners'] = '';
                }
            }
        } else {
            $result['winners'] = '';
        }

        $result['users_count'] = LotteryUsers::where('allow_lottery', 1)->whereNotNull('card_no')->count();

        return response()->json($result);
    }

    public function setStart(Request $request)
    {
        $settings = LotterySettings::find($request->id);
        if ($settings->prize_grade == $request->prize_grade) {
            $settings->prize_grade_times += 1;
        } else {
            $settings->prize_grade_times = 0;
        }
        $settings->lottery_status = 1;
        $settings->save();
        return redirect(route('lottery.setting'));
    }

    public function setStop(Request $request)
    {
        $settings = LotterySettings::find($request->id);

        if ($settings->allow_winners) {
            $users = LotteryUsers::where('allow_lottery', 1)->whereNotNull('card_no')->get();
        } else {
            $users = LotteryUsers::where('allow_lottery', 1)->whereNotNull('card_no')->whereRaw('id NOT IN (SELECT uid FROM winners)')->get();
        }
        $ids = $users->pluck('id')->toArray();
        if (count($ids) < $settings->winners_count) {
            $winners_count = count($ids);
        } else {
            $winners_count = $settings->winners_count;
        }
        if ($winners_count > 0) {
            $random_ids = array_random($ids, $winners_count);
            foreach ($random_ids as $id) {
                Winners::create([
                    'uid' => $id,
                    'grade' => $settings->prize_grade,
                    'grade_times' => $settings->prize_grade_times
                ]);
            }
        }

        $settings->lottery_status = 0;
        $settings->save();
        return redirect(route('lottery.setting'));
    }

    public function setting()
    {
        $settings = LotterySettings::find(1);
        if ($settings != null) {
            if ($settings->allow_winners) {
                $count = LotteryUsers::where('allow_lottery', 1)->whereNotNull('card_no')->count();
            } else {
                $count = LotteryUsers::where('allow_lottery', 1)->whereNotNull('card_no')->whereRaw('id NOT IN (SELECT uid FROM winners)')->count();
            }
            $settings->can_take_persons = $count;
        }

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
        $users = LotteryUsers::where('allow_lottery', 1)->whereNotNull('card_no')->get();
        $datas = array();
        foreach ($users as $user) {
            array_push($datas, [
                'name' => $user->name,
                'avatar' => url('img/'.$user->card_no.'.png'),
                'data' => array('id' => $user->id)
            ]);
        }
        return response()->json($datas);
    }
}
