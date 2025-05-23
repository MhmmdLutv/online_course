<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    

    public function showLoginForm()
    {
        return view('auth.login');
    }

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
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('dashboard.home');
        } else {
            return view('dashboard.user');
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }


    protected function redirectTo()
    {
        // if (auth()->user()->role === 'admin') {
        //     return '/dashboard';
        // } else {
        //     return '/user-dashboard';
        // }

        if (auth()->user()->role === 'admin') {
            return '/dashboard/admin';
        } else {
            return '/dashboard/user';
        }
    }
}
