<?php

namespace App\Http\Controllers;

use app\Log;
use App\Models\LotterySettings;
use App\Models\LotteryUsers;
use App\Models\Winners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LotteryController extends Controller
{
    public function checkIfStart()
    {
        $result['users_count'] = LotteryUsers::whereNotNull('card_no')->count();
        return response()->json($result);
    }

    public function setStart(Request $request)
    {
        $settings = LotterySettings::find($request->id);

        if ($settings->allow_winners) {
            $count = LotteryUsers::where('allow_lottery', 1)->whereNotNull('card_no')->count();
        } else {
            $count = LotteryUsers::where('allow_lottery', 1)->whereNotNull('card_no')->whereRaw('id NOT IN (SELECT uid FROM winners)')->count();
        }

        if ($settings->winners_count > $count) {
            session()->flash('error', '中奖人数不能大于参加人数！');
            return back()->withInput();
        }

        if ($settings->prize_grade == $request->prize_grade) {
            $settings->prize_grade_times += 1;
        } else {
            $settings->prize_grade_times = 0;
        }
        $settings->lottery_status = 1;
        $settings->save();

        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );
        $pusher = new \Pusher\Pusher(
            '8fe8f50d614f0c8eccc6',
            'b4439addf5947aa632bc',
            '467342',
            $options
        );
        /*
        $pusher = new \Pusher\Pusher(
            '7cd7c85d75944ee9cea8',
            '6f5e81fa6ee6f217f25a',
            '467353',
            $options
        );
         */

        $push_datas = array('status' => 1, 'count' => $settings->winners_count);
        $data['message'] = json_encode($push_datas);
        $res = $pusher->trigger('my-channel', 'my-event', $data);

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

        $winners = array();
        if ($winners_count > 0) {
            $random_ids = array_random($ids, $winners_count);
            foreach ($random_ids as $id) {
                Winners::create([
                    'uid' => $id,
                    'grade' => $settings->prize_grade,
                    'grade_times' => $settings->prize_grade_times
                ]);
            }
            $winners = LotteryUsers::whereIn('id', $random_ids)->select('card_no')->get()->pluck('card_no');
        }

        $settings->lottery_status = 0;
        $settings->save();

        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );
        $pusher = new \Pusher\Pusher(
            '8fe8f50d614f0c8eccc6',
            'b4439addf5947aa632bc',
            '467342',
            $options
        );
        /*
        $pusher = new \Pusher\Pusher(
            '7cd7c85d75944ee9cea8',
            '6f5e81fa6ee6f217f25a',
            '467353',
            $options
        );
         */

        $push_datas = array('status' => 0, 'winners' => $winners);
        $data['message'] = json_encode($push_datas);
        $res = $pusher->trigger('my-channel', 'my-event', $data);

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
        if (intval($request->winners_count) > intval($request->can_take_person)) {
            session()->flash('error', '中奖人数不能大于参加人数！');
            return back()->withInput();
        }
        $settings = LotterySettings::find($request->id);
        $allow_winners = $request->allow_winners ?? 0;
        $allow_win = $request->allow_win ?? 1;

        if ($allow_win) {
            LotteryUsers::where('id', '<', 7)->update(['allow_lottery' => 1]);
        } else {
            LotteryUsers::where('id', '<', 7)->update(['allow_lottery' => 0]);
        }

        if ($settings == null) {
            LotterySettings::create([
                'winners_count' => $request->winners_count,
                'prize_grade' => $request->prize_grade,
                'allow_winners' => $allow_winners,
                'allow_win' => $allow_win,
            ]);
        } else {
            $settings->winners_count = $request->winners_count;
            $settings->prize_grade = $request->prize_grade;
            $settings->allow_winners = $allow_winners;
            $settings->allow_win = $allow_win;
            $settings->save();
        }
        return redirect(route('lottery.setting'));
    }

    public function users()
    {
        $users = LotteryUsers::whereNotNull('card_no')->get();
        $datas = array();
        foreach ($users as $user) {
            array_push($datas, [
                'name' => $user->name,
//                'avatar' => url('img/'.$user->card_no.'.png'),
                'avatar' => 'http://p3iofnt9s.bkt.clouddn.com/lottery/'.$user->card_no.'.png',
                'data' => array('id' => $user->id, 'card_no' => $user->card_no)
            ]);
        }
        return response()->json($datas);
    }

    public function winners()
    {
        $histories = Winners::with('lottery_users')->get();
        if ($histories != null) {
            $histories = $histories->groupBy('grade_times');
        }
        $winner_histories= [];
        foreach($histories as $grade_time => $winners) {
            $winner_histories[$grade_time] = [
                'name' => $winners->get(0)->grade,
                'winners' =>[]
            ];
            foreach ($winners as $winner) {
                $winner_histories[$grade_time]['winners'][] = $winner->lottery_users->name;
            }
        }
        $datas['status'] = 'succ';
        $datas['histories'] = $winner_histories;
        return response()->json($datas);
    }
}
