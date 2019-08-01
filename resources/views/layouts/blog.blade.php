@include ('layouts.frontend.header')
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="{{ route('welcome') }}">
            <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>
          <ul class="nav nav-navbar">
            <li class="nav-item">
              <a class="nav-link active" href="#">Category <span class="arrow"></span></a>
              <nav class="nav">
               @foreach($categories as $category)
                <a class="nav-link active" href="{{ route('blog.category', $category->slug) }}">
                   {{$category->name}}
                  </a>
                  @endforeach
                <div class="nav-divider"></div>
              </nav>
            </li>
          </ul> 
        </section>
        <a class="btn btn-xs btn-round btn-success" href="{{ ('/home') }}">Login</a>
      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
        @yield ('header')
    <!-- /.header -->


    <!-- Main Content -->
      @yield ('content')
    <!-- /.Main Content -->

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
              <div class="social social-cycling text-center">
                  <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
                  <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
                  <a class="social-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                  <a class="social-git" href="#"><i class="fa fa-git"></i></a>
                  <a class="social-youtube" href="#"><i class="fa fa-youtube"></i></a>
                  
                </div>
          </div>

          <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="../uikit/index.html">Elements</a>
              <a class="nav-link" href="../block/index.html">Blocks</a>
              <a class="nav-link" href="../page/about-1.html">About</a>
              <a class="nav-link" href="../blog/grid.html">Blog</a>
              <a class="nav-link" href="../page/contact-1.html">Contact</a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script id="dsq-count-scr" src="//cerita-koding.disqus.com/count.js" async></script>
    <script src="{{ asset('js/theme/page.js') }}"></script>
     <script src="{{ asset('js/theme/script.js') }}"></script>
     <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d0bbd81c2c4026d"></script>

  </body>
</html>
