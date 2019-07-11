@extends('layouts.master')
<link href="{{ asset('/css/profile.css') }}" rel="stylesheet">

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-4">
                @foreach($serverList as $key)
                    <form action="/selectMinecraftServer" method="post">
                        <input type="number" name="id" value="{{ $key->id }}" style="display: none">
                        @csrf
                        <span class="border border-primary menuOpciones">
                            <input type="submit" value="{{ $key->server_Name }}">
                </span>

                    </form>
                @endforeach
            </div>

        </div>
    </div>
    </div>


    <script src="{{ asset('/lib/Jquery/dist/jquery.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/PopperJs/popperjs.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}" rel="script"></script>
@stop
