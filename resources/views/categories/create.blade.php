@extends('layouts.backend')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">

                <div class="card card">
                    <div class="card-header">
                        Edit kategori
                    </div>
                    <div class="card-body">

                        <form
                            action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store')}}"
                            method="POST">
                            @csrf

                            @if(isset($category))
                            @method('PUT')
                            @endif

                            <div class="form-group">
                                <label for="title">Category Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ isset($category) ? $category->name: ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Permalink</label>
                                <input type="text" id="slug" class="form-control" name="slug"
                                    value="{{ isset($category) ? $category->slug: ''}}">
                            </div>
                            <div class="form-group">
                                <button
                                    class="btn btn-success">{{ isset($category) ? 'Edit kategori' : 'Tambah Kategory'}}
                                </button>
                            </div>
                    </div>
                </div>
    @endsection
