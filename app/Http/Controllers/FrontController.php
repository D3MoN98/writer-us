<?php

namespace App\Http\Controllers;

use App\Writer;
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
        $writers = Writer::all();

        return view('writer')->with(['writers' => $writers]);
    }
}