@extends ('layouts.backend')

@section ('content')
<div class="main-panel">
        <div class="content">
                <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">EDIT POST PANEL</h4>
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
                            <a href="{{ route('posts.create') }}">Create Post</a>
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
    <div class="col-12 col-md-8">
        <div class="card">          
             <div class="card-body">

                <form action="{{ route('posts.update',$post->id)  }}" method="POST" enctype="multipart/form-data"> 
                @csrf    
                @method('PUT')
                
                <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value=" {{ old('title') }} {{ $post->title }}">
                @error('title')
                <td><p class="text-danger">{{$message}}</p></td>
                @enderror
                </div>
            
                <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description"  id="description" cols="3" rows="3" class="form-control @error('description')  is-invalid @enderror"> {{ old('description') }} {{ isset($post) ? $post->description:''}}</textarea> 
                @error('description')
                <td><p class="text-danger">{{$message}}</p></td>
                @enderror
                </div>

             
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" class="form-control @error('content')  is-invalid @enderror" name="content" rows="10" cols="50" >{{ old('content') }} {{  $post->content }}</textarea>
                    @error('content')
                    <td><p class="text-danger">{{$message}}</p></td>
                    @enderror
                </div>
    

                <div class="form-group">
                <img src="{{ URL::asset('storage/'.$post->image) }}" alt="" style="width:100%">
                </div>
            
                <div class="form-group">
                <label for="image"> Image </label>
                <input type="file" class="form-control" name="image" id="image" value=" {{ old('image') }}">
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round ml-auto"> <i class="fa fa-plus"> Edit Post </i> </button>
                </div> 
            </div>
        </div>
    </div>
        
        <div class="col-6 col-md-4">
        <div class="card">
            <div class="card-body">

                    <div class="form-group">
                        <label for="slug">Permalink</label>
                        <input name="slug" id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"  
                        value="{{ $post->slug }}">
                        @error('slug')
                        <td><p class="text-danger">{{$message}}</p></td>
                        @enderror
                    </div>

                    <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category_id" class="form-control  @error('category') is-invalid @enderror">
                                @foreach($categories as $category)
                                <option value="{{ old('category_id') }} {{ $category->id }}" 
                                        @if($category->id == $post->category_id)
                                        selected
                                        @endif
                                >
                                {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <td><p class="text-danger">{{$message}}</p></td>
                            @enderror
                    </div>
        

                    <div class="form-group">
                            @if($tags->count() >0)
                            <label for="tags">Tags</label>   
                            <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                            @foreach($tags as $tag) 
                                <option value=" {{ $tag->id }}"
                                    @if($post->hasTag($tag->id))
                                    selected
                                    @endif
                                >
                            {{ $tag->name }}
                            </option>  
                            @endforeach
                        </select>
                        </div>
                    
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" class ="form-control" name="published_at" id="published_at" value="{{ old('published_at') }} {{  $post->published_at }}">
                </div>

             
                @endif
                </div>
            </form>
         </div>
    </div>
</div>


@endsection