@extends ('layouts.blog')

@section ('title')
Cerita Koding | Berbagi Cerita...
@endsection


   
@section ('header')
    <!-- Header -->
    <header class="header text-center text-white"
     style="background-image: 
     linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h1>Latest Blog Posts</h1>
            <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>
          </div>
        </div>
      </div>
    </header><!-- /.header -->
@endsection


@section ('content')

<!-- Main Content -->
<main class="main-content">
    <section class="section p-0">
      <div class="container">
        <div class="row">
        <div class="col-md-8 col-xl-6 mx-auto">

            {{-- Search --}}
            <br>
            <form class="input-group" action="{{ route('welcome') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search by Title" value="{{ request()->query('search') }}">
                <div class="input-group-addon">
                  <span class="input-group-text"><i class="ti-search"></i></span>
                </div>
              </form>
          {{-- search --}} 
            
        
         
           @forelse($posts as $post)
             <article class="my-6">
              <header class="text-center mb-6">
                <p>
                  <a href="{{ route('blog.category', $post->category->slug) }}" class="small-4 text-lighter text-uppercase ls-2 fw-600">{{ $post->category->name}}</a></p>
                <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title}}</a></h3>
              </header>

              <a href="{{ route('blog.show', $post->slug) }}"><img class="rounded-md" src="{{ URL::asset('storage/'.$post->image) }}" alt="..."></a>

              <div class="card-body">
                <div class="row mb-5 small-2 text-lighter">
                  <div class="col-auto">
                    <a class="text-inherit" href="#">Ditulis Oleh {{ $post->user->name}}  </a>
                    <span class="align-middle px-1">&bull;</span>
                    <time datetime="2018-05-15T19:00">{{ date('d F Y', strtotime($post->published_at)) }}</time>
                  </div>
 
                  <div class="col-auto ml-auto">
                    <span><i class="fa fa-eye pr-1 opacity-60"></i> 3,597</span>
                    <a class="text-inherit ml-5" href="#disqus_thread" data-disqus-identifier="12345"><i class="fa fa-comments pr-1 opacity-60"></i>100 </a>
                   
                  </div>
                </div>

                <p class="text-justify">{{ str_limit($post->description, 300)}}</p>

                <p class="text-center mt-3">
                  <a class="btn btn-primary btn-round" href="{{ route('blog.show', $post->slug) }}">Read more</a>
                </p>
              </div>
            </article>
            <hr>

          @empty
          <p class="text-center">
            Tidak Ada hasil yang ditemukan untuk pencarian
            <strong>" {{ request()->query('search') }} "</strong>
          </p>
          
          @endforelse

          
            
            {{ $posts->appends(['search' => request()->query('search') ])->links() }}

          </div>
        </div>

      </div>
    </section>
  </main>
@endsection
    
 


    