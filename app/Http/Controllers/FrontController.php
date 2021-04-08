<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function job()
    {
        return view('job');
    }

    public function writer()
    {
        return view('writer');
    }
}