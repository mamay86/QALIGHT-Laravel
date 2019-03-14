<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script type="text/javascript">
        var _token = '{!! csrf_token() !!}';
        var _url = '{!! url("/") !!}';
        var _appTimeZone = '{!! config('app.timezone', 'UTC') !!}';
    </script>

    {{-- Meta --}}
    @yield('meta')
    {{-- Title --}}
    <title>{{ config('app.name', 'Laravel') }}  - @yield('title')</title>
    {{--Common App Styles And Fonts--}}
<!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">



    {{--Styles--}}
    @yield('styles')
    {{--Head--}}
    @yield('head')
</head>
<body class=@yield('body_class')>
<div id="app">
    @yield('navigation')
    @yield('jumbotron')
    @yield('page')
    @yield('footer')
</div>
<!-- Scripts -->
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')
</body>
</html>