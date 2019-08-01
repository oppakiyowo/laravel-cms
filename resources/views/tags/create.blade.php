@extends('layouts.backend')

@section('content')

<div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">

<div class="card card-default">
    <div class="card-header">
        {{ isset($tag) ? 'Edit Tag' : 'Tambah Tag'}}
    </div>
    <div class="card-body">
 
       
        
        <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="POST">
        @csrf
     

        @if(isset($tag))
            @method('PUT')
        @endif
        


        <div class="form-group">
            <label for="title">Permalink</label>
        <input type="text" id="slug" class="form-control" name="slug"  value="{{ isset($tag) ? $tag->slug: ''}}">
         </div>



        <div class="form-group">
        <input type="text" id="name" class="form-control" name="name"  value="{{ isset($tag) ? $tag->name: ''}}">
        </div>

        <div class="form-group">
        <button class="btn btn-success">{{ isset($tag) ? 'Edit Tag' : 'Tambah Tag'}} </button>
        </div>
</div>
</div>
             
           
     
@endsection


