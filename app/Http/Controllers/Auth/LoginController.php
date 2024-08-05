<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showFormLogin(){
        return view('auth.login');
    }

    protected function login(){
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' =>['required'],
        ]);

        if(Auth::attempt($credentials)){
            request()->session()->regenerate();

            /**
             * @var User $user
             */
            $user = Auth::user();
            if($user->role == 1){
                return redirect()->route('admin');
            }else{
                return redirect()->route('home');
            }

        }

        return back()->withErrors([
            'email' => 'Email không tồn tại',
        ])->onlyInput('email');
    }


}
