<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<<<<<<< HEAD
    <link href="{{ asset('/lib/fontawesome-free-5.9.0-web/css/all.min.css') }}" rel="stylesheet">
=======
    <meta name="csrf-token" content="{{ csrf_token() }}">
>>>>>>> 6df40d11a2286b9dac9abea728672c17b5281d59
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">

    <title>Lol Shark</title>

</head>
<body>

@include('layouts.navbar')

<div class="container-fluid">
    @yield('content')
</div>


<<<<<<< HEAD


<script src="{{ asset('/lib/Jquery/dist/jquery.min.js') }}" rel="script"></script>
<script src="{{ asset('/lib/PopperJs/popperjs.min.js') }}" rel="script"></script>

=======
>>>>>>> 6df40d11a2286b9dac9abea728672c17b5281d59
</body>
</html>
