<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|email',
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

        return back()->withSuccess('Register successful');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}