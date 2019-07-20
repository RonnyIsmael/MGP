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

    <script src="{{ asset('/js/index.js') }}" rel="script"></script>

@stop
