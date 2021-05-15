<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\Mail\MessageToAdminMail;
use App\User;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class FrontController extends Controller
{
    public function home()
    {
        $writers = Writer::all();

        return view('home')->with(['writers' => $writers]);
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

    public function blogs(Request $request)
    {
        $blogs = Blog::paginate(1);

        if ($request->search) {
            $blogs = Blog::where('title', 'like', "%$request->search%")->orWhere('content', 'like', "%$request->search%")->paginate(1);
        }

        $blog_categories = BlogCategory::all()->sortBy('name');


        return view('blogs')->with([
            'blogs' => $blogs,
            'blog_categories' => $blog_categories,
        ]);
    }


    public function blog($slug)
    {
        $blog = Blog::findBySlug($slug);
        $blogs = Blog::all();
        $blog_categories = BlogCategory::all()->sortBy('name');



        return view('blog_details')->with([
            'blogs' => $blogs,
            'blog' => $blog,
            'blog_categories' => $blog_categories,

        ]);
    }



    public function blogByCategory($slug)
    {
        $blogs = BlogCategory::findBySlug($slug)->blogs()->paginate(1);
        $blog_categories = BlogCategory::all()->sortBy('name');


        return view('blogs')->with([
            'blogs' => $blogs,
            'blog_categories' => $blog_categories,
        ]);
    }


    public function add_comment(Request $request, $blog_id)
    {
        $comment = $request->comment;
        $comment['user_id'] = Auth::id();
        $comment['blog_id'] = $blog_id;

        BlogComment::create($comment);

        return redirect()->back()->withSuccess('Comment added');
    }

    public function message(Request $request)
    {
        return view('message');
    }

    public function messageSend(Request $request)
    {
        $message = $request->message;

        Mail::to(User::find(1)->email)->send(new MessageToAdminMail(Auth::user(), $message));

        return redirect()->back()->withSuccess('Message sent successfully');
    }
}