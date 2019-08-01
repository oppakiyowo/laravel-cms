@extends('layouts.backend')

@section('content')

<div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">DataTables.Net</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                <i class="flaticon-home"></i>
                                </a>
                            </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Tables</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Datatables</a>
                        </li>
                    </ul>
                </div>
              <div class="card">
                <div class="card-header">My Profile</div>
             
                <div class="card-body">
                
                    <form action="{{ route('users.update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="about">About Me</label>
                        <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->about }}</textarea>
                    </div> 
                     <button class="btn btn-success btn-md" type="submit">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

@endsection
