<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\LotteryUsers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        AuthenticatesUsers::login as defaultLogin;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $user = $this->guard()->getProvider()->retrieveByCredentials($this->credentials($request));
        if (!$user) {
            session()->flash('error', '请输入正确的名字！');
            return back();
        }
        if ($request->poker_size == 53) {
            $card_no = 53;
        } elseif($request->poker_size == 54) {
            $card_no = 54;
        } else {
            $card_no = ($request->poker_size) * 13 +  ($request->poker_number);            
        }
        
        $user = LotteryUsers::where('card_no', $card_no)->first();
        if ($user && $user->name !== $request->name) {
            session()->flash('error', '此牌号已被他人拥有！');
            return back();
        }
        $user = LotteryUsers::where('name', $request->name)->first();
        if ($user && $user->card_no && $user->card_no !== $card_no) {
            session()->flash('error', '请输入您正确的牌号！');
            return back();
        }
        $user->card_no = $card_no;
        $user->save();

        return $this->defaultLogin($request);
    }

    public function username()
    {
        return 'name';
    }
}
