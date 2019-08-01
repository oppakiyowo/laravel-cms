<?php

namespace App\Http\Controllers\Blog;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function show($slug)
    {   
        $post =Post::Published()->where('slug', $slug)->FirstOrFail();

        return view('blog.show')
        ->with('post', $post)
        ->with('categories', Category::all());
    }

    public function category_show($slug) 
    {
      
      $category =Category::where('slug', $slug)->FirstOrFail();

      return view('blog.category')
        ->with('category', $category)
        ->with('tags', Tag::all())
        ->with('categories', Category::all())
        ->with('posts', $category->posts()->Searched()->orderBy('published_at', 'DESC')->simplepaginate(6));
        
    }
    
    public function tag($slug)
    {

      $tag =Tag::where('slug', $slug)->FirstOrFail();

      return view('blog.tag')
        ->with('tag', $tag)
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('posts', $tag->posts()->Searched()->orderBy('published_at', 'DESC')->simplePaginate(6));
        
        
    }
    
}
