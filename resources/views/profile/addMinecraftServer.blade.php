@extends('layouts.master')
<link href="{{ asset('/css/profile.css') }}" rel="stylesheet">

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 text-center">
                <form action="{{ url('/saveMinecraftServer') }}" method="post">
                    {{ csrf_field() }}
                    <p>Nombre del servidor:
                        <input type="text" name="mcServerName" required>
                    </p>
                    <p>Dirección IP del servidor:
                        <input type="text" name="direccionIP" required>
                    </p>
                    <p>Puerto RCON del servidor:
                        <input type="number" name="puertoRCON" value="25575" required>
                    </p>
                    <p>Contraseña RCON del servidor:
                        <input type="password" name="passwordRCON" required>
                    </p>
                    <p>
                        <button type="submit" class="btn btn-dark">Añadir</button>
                    </p>
                </form>
            </div>

        </div>
    </div>


@stop
