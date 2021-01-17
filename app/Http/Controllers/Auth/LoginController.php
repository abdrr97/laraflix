<?php

namespace App\Http\Controllers\Auth;

use GeoIP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\UserGeoLogin;
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

    public function authenticated(Request $req)
    {

        if (Auth::user()) {
            $user = auth()->user();
            $user->last_connected = now();
            $user->save();

            $user_login_info = GeoIP::getLocation();
            if (!$user_login_info->default) {
                UserGeoLogin::create([
                    "ip" => $user_login_info->ip,
                    "continent_name" => $user_login_info->continent_name,
                    "country_code" => $user_login_info->country_code2,
                    "country_name" => $user_login_info->country_name,
                    "country_capital" => $user_login_info->country_capital,
                    "state_prov" => $user_login_info->state_prov,
                    "zipcode" => $user_login_info->zipcode,
                    "latitude" => $user_login_info->latitude,
                    "longitude" => $user_login_info->longitude,
                    "country_flag" => $user_login_info->country_flag,
                    "isp" => $user_login_info->isp,
                    "user_agent" => request()->userAgent(),
                    "user_id" => $user->id,
                ]);
            }
        }
    }
}
