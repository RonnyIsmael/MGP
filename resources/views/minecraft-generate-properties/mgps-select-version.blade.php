@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-12">
            <p class="text-center">
                <strong>Selecciona version:</strong>
                <select class="" id="selectorVersiones"></select>
            </p>
        </div>
    </div>
    <div class="col-12">
        <p class="text-center">
            <a id="Enlace" href="">
                <button type="button" id="Comenzar" class="btn btn-outline-dark">Comenzar</button>
            </a>
        </p>
    </div>


    <script src="{{ asset('/lib/Jquery/dist/jquery.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/PopperJs/popperjs.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}" rel="script"></script>
    <script src="{{ asset('/js/index.js') }}" rel="script"></script>


@stop
