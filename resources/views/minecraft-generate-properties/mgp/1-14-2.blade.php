@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="row mt-4">
        <div class="col-4">
            <p>Nombre del servidor: <input id="nombreServidor" type="text" value="Servidor de pruebas"></p>

            <p>Puerto del servidor (Defecto 25565): <input id="puerto" type="text" value="25565"></p>

            <p>Dirección ip del servidor: <input id="ip" type="text"></p>

            <p>Cantidad maxima de jugadores: <input id="maxPlayers" type="number" value="20"></p>

            <p>¿Jugadores pueden pegarse? (PVP)
                <select id="pvp">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                </select>
            </p>


            <p>¿Hay animales en el servidor?
                <select id="animales">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                </select>
            </p>

            <p>¿Hay monstruos en el servidor?
                <select id="monstruos">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                </select>
            </p>

            <p>¿Hay aldeanos en el servidor?
                <select id="npcs">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                </select>
            </p>


            <p>¿Servidor solo para jugadores premium? (online-mode)
                <abbr title="SI = solo jugadores con minecraft premium, NO = Todo el mundo"><i
                        class="fas fa-question"></i></abbr>
                <select id="onlineMode">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                </select>
            </p>
        </div>


        <div class="col-12 text-center">
            <button id="botonGenerar" type="submit" class="btn btn-dark btn-lg mb-2">Generar</button>
            <p>
                <textarea id="porpiedadesServidorGeneradas" rows="4" cols="50"></textarea>
            </p>
        </div>
    </div>
    <script src="{{ asset('/js/General.js') }}" rel="script"></script>
    <script type="text/javascript">
        const versionName = self.location.href.match(/\/([^/]+)$/)[1];

        var botonGenerar = document.getElementById("botonGenerar");
        botonGenerar.addEventListener('click',
            function () {
                var porpiedadesServidorGeneradas = document.getElementById('porpiedadesServidorGeneradas');

                var nombreServidor = document.getElementById("nombreServidor");
                var puertoServidor = document.getElementById("puerto");
                var ipServidor = document.getElementById("ip");
                var maxPlayersServidor = document.getElementById("maxPlayers");
                var pvpServidor = document.getElementById("pvp");
                var animalesServidor = document.getElementById("animales");
                var monstruosServidor = document.getElementById("monstruos");
                var npcsServidor = document.getElementById("npcs");
                var onlineModeServidor = document.getElementById("onlineMode");

                nombreServidor = nombreServidor.value;
                puertoServidor = puertoServidor.value;
                ipServidor = ipServidor.value;
                maxPlayersServidor = maxPlayersServidor.value;
                pvpServidor = pvpServidor.value;
                animalesServidor = animalesServidor.value;
                monstruosServidor = monstruosServidor.value;
                npcsServidor = npcsServidor.value;
                onlineModeServidor = onlineModeServidor.value;

                let out = '#Minecraft server properties version: ' + versionName + '\n' +
                    'spawn-protection=16\n' +
                    'max-tick-time=60000\n' +
                    'query.port=25565\n' +
                    'generator-settings=\n' +
                    'force-gamemode=false\n' +
                    'allow-nether=true\n' +
                    'enforce-whitelist=false\n' +
                    'gamemode=survival\n' +
                    'broadcast-console-to-ops=true\n' +
                    'enable-query=false\n' +
                    'player-idle-timeout=0\n' +
                    'difficulty=easy\n' +
                    'broadcast-rcon-to-ops=true\n' +
                    'spawn-monsters=' + monstruosServidor + '\n' +
                    'op-permission-level=4\n' +
                    'pvp=' + pvpServidor + '\n' +
                    'snooper-enabled=true\n' +
                    'level-type=default\n' +
                    'hardcore=false\n' +
                    'enable-command-block=false\n' +
                    'network-compression-threshold=256\n' +
                    'max-players=' + maxPlayersServidor + '\n' +
                    'max-world-size=29999984\n' +
                    'resource-pack-sha1=\n' +
                    'rcon.port=25575\n' +
                    'server-port=' + puertoServidor + '\n' +
                    'server-ip=' + ipServidor + '\n' +
                    'spawn-npcs=' + npcsServidor + '\n' +
                    'allow-flight=false\n' +
                    'level-name=world\n' +
                    'view-distance=10\n' +
                    'resource-pack=\n' +
                    'spawn-animals=' + animalesServidor + '\n' +
                    'white-list=false\n' +
                    'rcon.password=\n' +
                    'generate-structures=true\n' +
                    'online-mode=' + onlineModeServidor + '\n' +
                    'max-build-height=256\n' +
                    'level-seed=\n' +
                    'prevent-proxy-connections=false\n' +
                    'use-native-transport=true\n' +
                    'motd=' + nombreServidor + '\n' +
                    'enable-rcon=false\n';

                porpiedadesServidorGeneradas.innerHTML = out;
            });
    </script>

@stop
