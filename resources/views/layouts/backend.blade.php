@include ('layouts.backend.header')
@include ('layouts.backend.navbar')
@include ('layouts.backend.sidebar')
@include ('partial.message')


@yield('content')
				
@yield('scripts')

@include ('layouts.backend.footer')


