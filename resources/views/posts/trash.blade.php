@extends('layouts.backend')
@section ('content')
<div class="main-panel">
<div class="content">
    <div class="page-inner">
        <div class="page-header">

            <h4 class="page-title">TRASHED POSTS PANEL</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('home') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('trashed-post.index') }}">Table Trashed Post</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a>List</a>
                </li>
            </ul>
        </div>
        
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Trashed Posts List</h4>
            </div>
        </div>
        <div class="card-body">
            @if($posts->count() >0)
            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image </th>
                            <th>Title</th>
                            <th width="220px">publish date</th>
                            @if(auth()->User()->isAdmin())
                            <th width="50px">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            @foreach ($posts as $post)
                            <td>
                                <img class="img-fluid"
                                src="{{ URL::asset('storage/'.$post->image) }}" height="80px"
                                width="120px" alt=""> 
                            </td>
                            <td> {{ $post->title }} </td>
                            <td>{{ $post->published_at }} |
                                {!! $post->publicationLabel() !!}
                            </td>

                            @if(auth()->User()->isAdmin())
                            <td>
                                <div class="form-button-action">
                                    <form action="{{ route('posts.destroy',$post->id ) }}"
                                        method="POST">
                                        @csrf
                                        @method ('DELETE')
                                        <button data-toggle="tooltip" title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Delete Permanently">
                                            <i class="fa fa-times"></i>
                                    </form>

                                    <form action="{{ route('restore-post',$post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" data-toggle="tooltip" title=""
                                            class="btn btn-link btn-info"
                                            data-original-title="Restore Post">
                                            <i class="fas fa-undo-alt"></i>
                                    </form>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h3 class="text-warning text-center">No Trashed Post Yet</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
