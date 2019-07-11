<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('/lib/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/fontawesome-free-5.9.0-web/css/all.min.css') }}" rel="stylesheet">


    <title>Lol Shark</title>

</head>
<body>

@include('layouts.navbar')

<div class="container-fluid">
    @yield('content')
</div>

</body>
</html>
