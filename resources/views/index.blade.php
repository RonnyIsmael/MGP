@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-12">
            <a href="/profile">Mi perfil</a>
        </div>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class="col-12">
        <p class="text-center">

        </p>
    </div>


    <script src="{{ asset('/lib/Jquery/dist/jquery.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/PopperJs/popperjs.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}" rel="script"></script>
@stop
