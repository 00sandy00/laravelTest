<html>
    <head>
        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}" ></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" ></script>

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        @stack('custom-style')
        @stack('custom-script')
    </head>
    <body>
        <div class="container">
            @csrf
            @yield('content')
        </div>
    </body>
</html>