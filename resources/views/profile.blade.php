@extends('layouts.master')
<link href="{{ asset('/css/profile.css') }}" rel="stylesheet">

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-4">
                <a href="/addMinecraftServer">
                <span class="border border-primary menuOpciones">
                         <span>Agregar Servidor</span>
                    <i class="fas fa-plus"></i>
                </span>
                </a>
            </div>
            <div class="col-4">
                <a href="/serverList">
                <span class="border border-primary menuOpciones">
                         <span>Mis servidores</span>
                    <i class="fas fa-server"></i>
                </span>
                </a>
            </div>

            <div class="col-4">

            </div>
        </div>
    </div>


    <script src="{{ asset('/lib/Jquery/dist/jquery.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/PopperJs/popperjs.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}" rel="script"></script>
@stop
