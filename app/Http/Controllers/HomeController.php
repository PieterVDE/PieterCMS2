<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $content = Content::latest('published_at')->published()->get();

        return view('home', compact('content'));
    }
}
