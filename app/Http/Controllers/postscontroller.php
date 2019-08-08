<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Category;
use App\Tag;
class postscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('VerifyCategoriesCount')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        

       $image =$request->image->store('posts');
       $post = Post::create([
        
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'image' => $image,
            'slug' => str_slug($request->title),
            'category_id' => $request->category,
            'user_id' => auth()->user()->id
    
    
        ]);  
    

        if ($request->tags){
            $post->tags()->attach($request->tags);
        }
       session()->flash('success', 'Post berhasil di buat');
       return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post =Post::where('slug', $slug)->firstorFail();
        
        return view('posts.edit')
        ->with('post', $post)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, post $post)
    {
       
        $data=$request->only(
            [
            'title',
            'description',
            'published_at',
            'content',
            'slug',
            'category_id' => $request->category,

            ]);
    
            if ($request->hasFile('image')){
            $image = $request->image->store('store');
            $post->deleteImage();
            $data['image'] =$image;
             }

            if ($request->tags){
                $post->tags()->sync($request->tags);
            }

            $post->update($data);
            session()->flash('success', 'Post berhasil di ubah');

            return redirect(route('posts.index'))->with('categories',Category::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post= Post::withTrashed()->where('id',$id)->firstOrFail();

        if ($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
            session()->flash('success', 'Post berhasil di delete permanen');
        }else {
            $post->delete();
            session()->flash('success', 'Post berhasil Masuk ke Trash');
        }

       
       return redirect(route('trashed-post.index'));
    }


    // menampilakn post trash

    public function trash()
    {
        $trashed =Post::onlyTrashed()->get();

        return view('posts.trash')->with('posts', $trashed);
        
    }

    public function restore($id)
    {   
        $post= Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post berhasil di Restore');
        return redirect()->back();
    
    }
    
}
