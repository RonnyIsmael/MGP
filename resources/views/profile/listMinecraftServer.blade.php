@extends('layouts.master')
<link href="{{ asset('/css/profile.css') }}" rel="stylesheet">
@csrf
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-4">
                @if(isset($serverList[0]) && is_array($serverList))
                    @foreach($serverList as $key)
                        <a href="/selectMinecraftServer/{{$key->server_Name}}">
                            <span class="border border-primary menuOpciones">{{ $key->server_Name }}</span>
                        </a>
                    @endforeach
                @else
                    <div class="alert alert-warning" role="alert">
                        <p>{{ $serverList }}</p>
                        <p><a href="/addMinecraftServer">Comenzar a añadir!</a></p>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <script src="{{ asset('/lib/Jquery/dist/jquery.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/PopperJs/popperjs.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}" rel="script"></script>
@stop
