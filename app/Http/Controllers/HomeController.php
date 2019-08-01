<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('posts_count', Post::all()->count())
        ->with('categories_count', Category::all()->count())
        ->with('trashed_count', Post::onlyTrashed()->count())
        ->with('users_count', User::all()->count());
    }

    public function backend()
    {
        return view('layouts.backend');
    }
}
