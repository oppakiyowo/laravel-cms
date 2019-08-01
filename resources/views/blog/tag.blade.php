@extends ('layouts.blog')

@section ('title')
Cerita Koding | Tag {{$tag->name }}
@endsection

@section ('header')
    <!-- Header -->
    <header class="header text  -center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>{{$tag->name }}</h1>
            <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->

@endsection

@section ('content')

<!-- Main Content -->

<main class="main-content">

    <section class="section bg-gray">
      <div class="container">
          <form class="input-group" action="" method="GET">
              <input type="text" class="form-control" name="search" placeholder="Search by Title" value="{{ request()->query('search') }}">
              <div class="input-group-addon">
                <span class="input-group-text"><i class="ti-search"></i></span>
              </div>
            </form>
            <hr>
        <div class="row gap-y">

            {{-- Search --}}
           
           
          {{-- search --}}
            
         
           @forelse($posts as $post)
           <div class="col-md-6 col-lg-4">
              <div class="card d-block border hover-shadow-6 mb-6">
                <a href="{{ route('blog.show', $post->slug) }}"><img class="card-img-top" src="{{ URL::asset('storage/'.$post->image) }}" alt="Card image cap"></a>
                <div class="p-6 text-center">
                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" >{{ $post->category->name}}</a></p>
                  <h5 class="mb-0"><a class="text-dark" href="{{ route('blog.show', $post->slug) }}">{{ $post->title}}</a></h5>
                </div>
              </div>
            </div>
          

          @empty
          <p class="text-center">
            Tidak Ada hasil yang ditemukan untuk pencarian
            <strong>" {{ request()->query('search') }} "</strong>
          </p>
          
          @endforelse
            
            

          </div>
          {{ $posts->appends(['search' => request()->query('search') ])->links() }}
        </div>

      </div>
    </section>
  </main>

            

@endsection
    
 


    


          