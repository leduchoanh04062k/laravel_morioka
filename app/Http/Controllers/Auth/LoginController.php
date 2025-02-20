<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        return 'username';
    }

    protected function credentials(Request $request){
        return [
            'username' => $request->{$this->username()},
            'password' => $request->password,
            'status' => '1'
        ];
    }

    protected function authenticated($request, $user){

        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);

        if($user->hasRole('Administration')){
            return redirect('/tongquan');
        }
        if($user->hasRole('Management')){
            return redirect('/hoadon');
        }
        if($user->hasRole('Seller')){
            return redirect('/banhang');
        }
        if($user->hasRole('Warehouse')){
            return redirect('/nhaptunhacungcap');
        }
    }

}
