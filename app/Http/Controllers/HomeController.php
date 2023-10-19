<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::check()) {
            // Fetch articles and return them, assuming you have an Article model.
            $articles = Article::all();
            return view('home', ['articles' => $articles]);
        }
        return view('home', ['articles' => []]);
    }
}
