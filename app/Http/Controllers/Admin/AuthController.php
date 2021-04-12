<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function loginAction(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $remember_me = $request->has('remember') ? true : false;

        $user = User::whereEmail($request->email)->first();

        if ($user && $user->isAdmin() && Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            return redirect('admin/dashboard');
        } else {
            return back()->withErrors(['login-error' => 'Credentials not matched', 'email' => $request->email]);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}