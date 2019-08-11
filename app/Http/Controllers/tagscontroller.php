<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\tags\CreatetagsRequest;
use App\Http\Requests\tags\UpdatetagsRequest;

class tagscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('errors.404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatetagsRequest $request)
    {
       
        Tag::create([
            'name'=>$request->name,
            'slug' => str_slug($request->name)
        ]);

        session()->flash('success', 'tag berhasil di tambah');

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // $tag =Tag::where('slug', $slug)->FirstOrFail();
        // return view('tags.create')->with('tag', $tag);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetagsRequest $request, Tag $tag)
    {
        
        $tag=Tag::findOrFail($request->catid);
        $tag->update($request->all());
       

        session()->flash('success', 'tag berhasil di ubah');
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag->posts->count() >0)
        {
            session()->flash('error', 'Tags tidak bisa di hapus, ada post menggunakan tags ini');
            
            return redirect()->back();
        }
        $tag->delete();

        session()->flash('success', 'Tag berhasil di hapus');
        return redirect(route('tags.index'));
    }
}
