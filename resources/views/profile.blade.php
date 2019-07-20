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
                    @php
                        $user = auth()->user();
                    @endphp
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
@stop
