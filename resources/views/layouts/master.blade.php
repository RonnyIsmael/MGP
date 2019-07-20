<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">

    <title>Lol Shark</title>

</head>
<body>

@include('layouts.navbar')

<div class="container-fluid">
    @yield('content')
</div>


</body>
</html>
