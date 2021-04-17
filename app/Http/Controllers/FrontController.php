<?php

namespace App\Http\Controllers;

use App\User;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FrontController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function testimonials()
    {
        return view('testimonials');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function writer()
    {
        $writers = Writer::all();

        return view('writer')->with(['writers' => $writers]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile')->with(['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::id())],
            'contact_no' => 'required|max:14',
        ]);

        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
        ]);

        return back()->withSuccess('Profile updated successfuly');
    }
}