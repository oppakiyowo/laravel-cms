@extends('layouts.backend')
@section ('content')
<div class="main-panel">
<div class="content">
    <div class="page-inner">
        <div class="page-header">

            <h4 class="page-title">POSTS PANEL</h4>
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
                    <a href="{{ route('posts.index') }}">Table Post</a>
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
                <h4 class="card-title">Posts List</h4>
                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-round ml-auto">
                    <i class="fa fa-plus">Add Post</i> </a>
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
                            <th>Category</th>
                            <th width="220px">publish date</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            @foreach ($posts as $post)
                            <td>
                                @if(!$post->trashed())
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank">
                                    @endif
                                    <img class="img-fluid"
                                        src="{{ URL::asset('storage/'.$post->image) }}" height="80px"
                                        width="120px" alt="">
                                </a>
                            </td>
                            <td>
                                @if(!$post->trashed())
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank">
                                    @endif
                                    {{ $post->title }}

                                </a>
                            </td>


                            <td>
                                <a href="{{ route('categories.edit',$post->category->slug) }}">
                                    {{ $post->category->name }}</a>
                            </td>


                            <td>{{ $post->published_at }} |
                                {!! $post->publicationLabel() !!}
                            </td>


                            @if(!$post->trashed())
                            <td>
                                <div class="form-button-action">
                                    <a href="{{ route('posts.edit',$post->slug) }}"
                                        class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                        title="" data-original-title="Edit Post"><i
                                            class="fa fa-edit"></i></a>
                                            @if(auth()->User()->isAdmin())
                                    <form action="{{ route('posts.destroy',$post->id ) }}"
                                        method="POST">
                                        @csrf
                                        @method ('DELETE')

                                         
                                        <button data-toggle="tooltip" title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Trash Post">
                                            <i class="fa fa-trash"></i>
                                            @endif
                                    </form>
                                </div>
                            </td>
                            @else
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
                                @endif
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h3 class="text-center">No Post Yet</h3>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
