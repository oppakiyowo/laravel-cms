@include ('layouts.backend.header')
@include ('layouts.backend.navbar')
@include ('layouts.backend.sidebar')

<div class="main-panel">
        <div class="content">
                <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title"> CREATE POST PANEL</h4>
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

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"> 
                @csrf    
        
                <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title')  is-invalid @enderror" name="title" id="title" value=" {{ old('title') }} ">
                @error('title')
                <td><p class="text-danger">{{$message}}</p></td>
                @enderror
                </div>

                <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="3" rows="3" class="form-control @error('description')  is-invalid @enderror"> {{ old('description') }} {{ isset($post) ? $post->description:''}}</textarea> 
                @error('description')
                <td><p class="text-danger">{{$message}}</p></td>
                @enderror
                </div>
        
                <div class="form-group">
                <label for="content">Content</label>
                <input id="content" class="@error('title')  is-invalid @enderror" type="hidden" name="content" value=" {{ old('content') }} ">
                <trix-editor input="content"></trix-editor>
                @error('content')
                <td><p class="text-danger">{{$message}}</p></td>
                @enderror
                </div>
    
        
                <div class="form-group">
                <label for="image"> Image </label>
                <input type="file" class="form-control  @error('image')  is-invalid @enderror" name="image" id="image" value=" {{ old('image') }}">
                @error('image')
                <td><p class="text-danger">{{$message}}</p></td>
                @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round ml-auto"> <i class="fa fa-plus">Tambah Post</i> </button>
                </div> 
                </div>
            </div>
        </div>
        
                        <div class="col-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                         <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control"> 
                                                @foreach($categories as $category)
                                                <option value="{{ old('category') }} {{ $category->id }}" 
                                                   
                                                    > 
                                                {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            </div>
                                
                                        <div class="form-group">
                                            <label for="published_at">Published At</label>
                                            <input type="text" class ="form-control" name="published_at" id="published_at" value="{{ old('published_at') }} {{ isset($post) ? $post->published_at: ''}}">
                                        </div>
                                                    <div class="form-group">
                                                       @if($tags->count() >0)
                                                       <label for="tags">Tags</label>   
                                                       <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                                                        @foreach($tags as $tag) 
                                                        <option value=" {{ $tag->id }}"
                                                            
                                                            >
                                                        {{ $tag->name }}
                                                        </option>  
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                    @endif
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/trix.js') }}"></script>
<script src="{{ asset('js/flatpicker.js') }}"></script>

<script>

flatpickr('#published_at',{
enableTime: true,
enableSeconds: true
})

$(document).ready(function() {
    $('.tags-selector').select2();
});
</script>


<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<!-- Datatables -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<!-- jQuery UI -->
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<!-- Atlantis JS -->
<script src="../assets/js/atlantis.min.js"></script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="../assets/js/setting-demo.js"></script>
<script src="../assets/js/demo.js"></script>
<script>
Circles.create({
    id:'circles-1',
    radius:45,
    value:60,
    maxValue:100,
    width:7,
    text: 5,
    colors:['#f1f1f1', '#FF9E27'],
    duration:400,
    wrpClass:'circles-wrp',
    textClass:'circles-text',
    styleWrapper:true,
    styleText:true
})

Circles.create({
    id:'circles-2',
    radius:45,
    value:70,
    maxValue:100,
    width:7,
    text: 36,
    colors:['#f1f1f1', '#2BB930'],
    duration:400,
    wrpClass:'circles-wrp',
    textClass:'circles-text',
    styleWrapper:true,
    styleText:true
})

Circles.create({
    id:'circles-3',
    radius:45,
    value:40,
    maxValue:100,
    width:7,
    text: 12,
    colors:['#f1f1f1', '#F25961'],
    duration:400,
    wrpClass:'circles-wrp',
    textClass:'circles-text',
    styleWrapper:true,
    styleText:true
})

var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

var mytotalIncomeChart = new Chart(totalIncomeChart, {
    type: 'bar',
    data: {
        labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
        datasets : [{
            label: "Total Income",
            backgroundColor: '#ff9e27',
            borderColor: 'rgb(23, 125, 255)',
            data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        scales: {
            yAxes: [{
                ticks: {
                    display: false //this will remove only the label
                },
                gridLines : {
                    drawBorder: false,
                    display : false
                }
            }],
            xAxes : [ {
                gridLines : {
                    drawBorder: false,
                    display : false
                }
            }]
        },
    }
});

$('#lineChart').sparkline([105,103,123,100,95,105,115], {
    type: 'line',
    height: '70',
    width: '100%',
    lineWidth: '2',
    lineColor: '#ffa534',
    fillColor: 'rgba(255, 165, 52, .14)'
});
</script>

<script >
        $(document).ready(function() {
            $('#basic-datatables').DataTable({
            });

            $('#multi-filter-select').DataTable( {
                "pageLength": 5,
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                                );

                            column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                    ]);
                $('#addRowModal').modal('hide');
            });
        });
    </script>
</body>
</html>