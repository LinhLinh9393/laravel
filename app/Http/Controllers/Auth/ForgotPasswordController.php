<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    // public function showLinkRequestForm(Request $request, $token = null){
    //     return view('auth.passwords.reset')->with(
    //         ['token' => $token, 'email' => $request->email]
    //     );
    // }

    // public function sendResetLinkEmail(UpdateUsersRequest $request, User $users, $id){
    //     $request->validate([
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $users->id,
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $users = User::findOrFail($id);
    //     $users->update([
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ]);


    //     return redirect()->route('auth.login') ->with('msg', 'Đổi mật khẩu thành công');
    // }
}
