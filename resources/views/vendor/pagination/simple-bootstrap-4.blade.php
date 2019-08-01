@if ($paginator->hasPages()) 
<nav class="flexbox my-8">

    @if ($paginator->onFirstPage())
        <a class="btn btn-outline-secondary disabled">
            <i class="ti-arrow-left fs-9 mr-2">
                </i> Newer
            </a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-secondary">
            <i class="ti-arrow-left fs-9 mr-2">
                </i> <strong>Newer</strong>
            </a>
    @endif
    {{-- batas previous pages --}}

    @if ($paginator->hasMorePages())
        <a class="btn btn-outline-secondary" href="{{ $paginator->nextPageUrl() }}" >
            <strong>Older </strong> 
        <i class="ti-arrow-right fs-9 ml-2">
            </i>
        </a>

    @else
        <a class="btn btn-outline-secondary disabled" >
            Older 
        <i class="ti-arrow-right fs-9 ml-2">
            </i>
        </a>
    @endif
</nav> 
@endif
 