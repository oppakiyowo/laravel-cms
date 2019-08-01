<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield ('title')
    </title>

    <!-- Styles -->
    <link  href="{{ asset('css/theme/page.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/theme/style.css') }}" rel="stylesheet">
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>

  <body class="layout-centered bg-gray">


    <!-- Main Content -->
    <main class="main-content text-center pb-lg-8">
      <div class="container">

        <h1 class="display-1 text-muted mb-7">Page Not Found</h1>
        <p class="lead">Seems you're looking for something that doesn't exist.</p>
        <br>
        <button class="btn btn-secondary w-150 mr-2" type="button" onclick="window.history.back();">Go back</button>
     

      </div>
    </main><!-- /.main-content -->


    <!-- Scripts -->
    <script src="{{ asset('js/theme/page.js') }}"></script>
     <script src="{{ asset('js/theme/script.js') }}"></script>

  </body>
</html>
