
@extends('layouts.backend')

@section ('content')

<div class="main-panel">
        <div class="content">
                <div class="page-inner">
                        <div class="page-header">
                            <h4 class="page-title">TAGS PANEL</h4>
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
                                    <a href="{{ route('tags.index') }}">Table Tag</a>
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
            <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tag List</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addTag">
                                <i class="fa fa-plus"></i>
                                Add Category
                            </button>
                    </div>
                </div> 
        <div class="card-body">
                @if($tags->count()>0)
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Tag Count</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                            <tr>
                            <td>{{ $tag->name}}</td>
                            <td>{{ $tag->posts->count() }} </td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="#editTag" 
                                            data-name="{{$tag->name}}" 
                                            data-slug="{{$tag->slug}}"  
                                            data-catid="{{$tag->id}}"  
                                            data-toggle="modal">            
                                        <button type="button" data-toggle="tooltip"
                                        class="btn btn-link btn-info" data-original-title="Edit Tag">
                                            <i class="fa fa-edit"></i></button>
                                        </a>

                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="handleDelete( {{ $tag->id }} )">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3 class="text-center">No tag Yet</h3>
                    @endif
                </div>
        </div>
    </div>
</div>
                                    
{{-- add tag modal --}}
<div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header no-bd">
            <h5 class="modal-title">
                <span class="fw-mediumbold">
                Add</span> 
                <span class="fw-light">
                    Tag
                </span>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('tags.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Tag Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" name="name" />
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer no-bd">
            <button type="submit"  class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
        </div>
    </div>
</div>
</div>

                                 
{{-- edit tag modal  --}}
<div class="modal fade" id="editTag" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('tags.update', $tag->id) }}" data-remote="true" method="POST">
            @method('PUT')
            @csrf
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    New</span> 
                    <span class="fw-light">
                        Row
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <p class="small">Edit Category</p>
            
                    <div class="row">
                        <input type="hidden" name="catid" id="cat_id" value="">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Tag Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Tag Permalink</label>
                                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"/>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer no-bd">
                <button type="submit"  class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
            </div>
        </div>
    </div>
</div>
{{-- end of edit modal --}}      

                                      
                                   
 <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
    <form action="" method="POST" id="deleteTagForm">
    @csrf

        @method('DELETE')
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Hapus Tag</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="text-center text-bold"> Apakah anda ingin mengapus tag ini ? </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak,Kembali</button>
            <button type="summit" class="btn btn-danger">Ya,Hapus</button>
        </div>
    </form>
        </div>
 </div>
</div>
	  
	  
@endsection

@section('scripts')

<script type="text/JavaScript">
    $(function () {
      $("#editTag").on("show.bs.modal", function (event) {
        
        var button = $(event.relatedTarget);
        var name = button.data("name");
        var slug = button.data("slug");
        var cat_id = button.data("catid");
        var modal = $(this);
      
       
        
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #slug').val(slug);
        modal.find('.modal-body #cat_id').val(cat_id);


      });
    });
</script>

<script type="text/JavaScript">
    $(function () {
    $("#addTag").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
    
    });
    });
</script>

<script>
    function handleDelete(id) {
        
        var form = document.getElementById('deleteTagForm')
        form.action = '/tags/' + id
       
        $('#deleteModal').modal('show')
    }
</script>
@endsection






