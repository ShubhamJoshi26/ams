@include('web-panels.header-top')
@yield('styles')
@yield('schema')


@include('web-panels.header-bottom')
@include('web-panels.menu')
@yield('content')
@include('web-panels.footer-top')
@yield('scripts')
@include('web-panels.footer-bottom')