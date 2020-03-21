<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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
     * @param $request
     * @param User $user
     * @return RedirectResponse|void
     */
//    protected $redirectTo = '/dashboard';

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
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ];
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse|Redirector
     */
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
