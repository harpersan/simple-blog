<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
        <title>Tailwind Starter Template - Ghostwind CSS : Tailwind Toolbox</title>
		<meta name="author" content="name">
        <meta name="description" content="description here">
		<meta name="keywords" content="keywords,here">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" type="text/css" >

</head>
<body>
    <div id="app">
        @include('layouts.header')

        @yield('content')
    </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/axios.min.js') }}"></script>
</body>
</html>
