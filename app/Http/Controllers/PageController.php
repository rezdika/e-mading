<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function category()
    {
        return view('category');
    }

    public function blogDetails()
    {
        return view('blog-details');
    }





    public function contact()
    {
        return view('contact');
    }

    public function notFound()
    {
        return view('404');
    }
}