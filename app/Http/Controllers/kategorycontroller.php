<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\Categories\CreateCategoriesRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;

class kategorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoriesRequest $request)
    {
       
        Category::create([
            'name'=>$request->name,
            'slug' => str_slug($request->name)
        ]);

        session()->flash('success', 'Kategori berhasil di tambah');
      
        return redirect(route('categories.index'));
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
        $category =Category::where('slug', $slug)->FirstOrFail();
        return view('categories.create')->with('category', $category);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        $category->update([
            'name'=>$request->name,
            'slug'=>$request->slug
        ]);

        session()->flash('success', 'Kategori berhasil di ubah');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->posts->count() >0)
        {
            session()->flash('error', 'Tidak bisa di hapus, Ada post yang menggunakan Kategori ini');

            
            return redirect()->back();
        }
        $category->delete();

        session()->flash('success', 'Kategori berhasil di hapus');
        return redirect(route('categories.index'));
    }
}
