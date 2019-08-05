
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
                                                                          
                                                                               <a href="{{ route('tags.edit', $tag->slug) }}" 
                                                                                  class="btn btn-link btn-primary btn-lg"  data-toggle="tooltip" title="" 
                                                                                   data-original-title="Edit Task"><i class="fa fa-edit"></i></a>
                                                                         
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
                                    
                                    <div class="col-6 col-md-4">
                                                    <div class="card card">
                                                             <div class="card-header">
                                                                    <div class="d-flex align-items-center">
                                                                        <h4 class="card-title">Create New Tag</h4>
                                                                    </div>
                                                                </div> 
                                                            <div class="card-body">
                                                                    
        
                                                                    <form action="{{ route('tags.store') }}" method="POST">
                                                                    @csrf
            
                                                                    
                                                                    <div class="form-group">
                                                                    <input type="text" id="name" class="form-control" name="name"  value="" placeholder="Isi Disini">
                                                                    </div>
                                                            
                                                                    <div class="form-group">
                                                                            <button class="btn btn-primary btn-round ml-auto"> <i class="fa fa-plus">  Tag </i> </button>
                                                                    </form>
                                                                    </div>
                                                                
                                                        </div>
                                                        </div>
                                            </div>


                                      
                                   
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
		  </div>
		</div>
	  </div>
	  
	  </form>
@endsection

@section('scripts')

<script>
    function handleDelete(id) {
        
        var form = document.getElementById('deleteTagForm')
        form.action = '/tags/' + id
       
        $('#deleteModal').modal('show')
    }
</script>
@endsection





