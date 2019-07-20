@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-12">
            <a href="/profile">Mi perfil</a>
        </div>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class="col-12">
        <p class="text-center"></p>
    </div>

@stop
