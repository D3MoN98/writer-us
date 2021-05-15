<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\RoleUser;
use App\User;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function loginAction(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember_me = $request->has('remember') ? true : false;

        $user = User::whereEmail($request->email)->first();

        if ($user && Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            return redirect('/');
        } else {
            return back()->withErrors(['login-error' => 'Credentials not matched', 'email' => $request->email]);
        }
    }

    public function registerAction(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'contact_no' => 'required|max:14',
            'password' => 'required_with:confirm_password|same:confirm_password|min:6',
            'confirm_password' => 'min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'password' => Hash::make($request->password),
        ]);


        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => 2
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));

        return back()->withSuccess('Register successful');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function forgetPassword(Request $request)
    {

        try {
            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                ? redirect()->route('home')->withSuccess($status)
                : redirect()->route('home')->withError(['forget-password-error' => "Something went wrong"], 422);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function resetPassword(Request $request)
    {

        try {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
            ]);

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) use ($request) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->save();

                    $user->setRememberToken(Str::random(60));

                    event(new PasswordReset($user));
                }
            );

            return $status == Password::PASSWORD_RESET
                ? redirect()->route('home')->withSuccess($status)
                : back()->withErrors(['reset-password-error' => __($status)], 422);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}