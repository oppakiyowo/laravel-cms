<?php

namespace App\Http\Controllers;
use App\Category;
use App\Tag; 
use App\Post;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        
        
    return view('welcome')
    
    ->with('categories', Category::All())
    ->with('tags', Tag::all())
    ->with('posts', Post::Searched()->orderBy('published_at', 'DESC')->simplepaginate(3));
    }
    
}
