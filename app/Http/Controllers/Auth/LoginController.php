<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/dashboard';

    public function authenticated($request, User $user)
    {
        if ($user->hasRole('isSuperAdmin')){
            return redirect()->route('dashboard');
        }
        elseif ($user->hasRole('isAdmin')){
            return redirect()->route('dashboard');
        }
        elseif ($user->hasRole('isUser')){
            return redirect()->route('index');
        }
        else{
            return abort(401);
        }
        /*if($user->hasRole('isSuperAdmin')){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('index');
        }*/
    }

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
}
