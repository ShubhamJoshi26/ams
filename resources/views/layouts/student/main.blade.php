@include('panels.header-top')
@yield('styles')
@yield('schema')


@include('panels.header-bottom')
@include('panels.student.side-menu')
@include('panels.student.menu')
@yield('content')
@include('panels.footer-top')
@yield('scripts')
@include('panels.footer-bottom')