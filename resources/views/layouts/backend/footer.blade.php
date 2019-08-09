</div>
</div>
</div>
<footer class="footer">
<div class="container-fluid">
    <nav class="pull-left">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="https://www.themekita.com">
                    ThemeKita
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Help
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Licenses
                </a>
            </li>
        </ul>
    </nav>
    <div class="copyright ml-auto">
        2019, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">EdoLorenza</a>
    </div>				
</div>
</footer>
</div>

{{-- package ckeditor  & unisharp filemanager --}}
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script> 
<script>
        var options = {
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
</script>

<script>
    CKEDITOR.replace('content', options);
    CKEDITOR.config.allowedContent = true; 
 </script>
<script src="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
<script>hljs.initHighlightingOnLoad();</script>
{{-- end of package ckeditor  & unisharp filemanager --}}

{{-- package select2 for category and flatpicker for date & time --}}
<script src="{{ asset('js/select2.min.js') }}"></script>
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
{{-- end of package select2 for category and flatpicker for date & time --}}

<!--   Core JS Files   -->

<script src="{{ asset ('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset ('assets/js/core/bootstrap.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
<!-- jQuery Sparkline -->
<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Chart Circle -->
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script> --}}
<!-- jQuery Vector Maps -->
<script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- Atlantis JS -->
<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>



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
                
            });
        });
    </script>
</body>
</html>
