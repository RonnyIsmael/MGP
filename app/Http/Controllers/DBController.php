<?php

namespace App\Http\Controllers;

use App\McServer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thedudeguy\Rcon;
use \App\Exceptions\UsersExceptions;
use Illuminate\Support\Facades\Log;

/**
 * Class DBController
 * Controlador encargado de las consultas insert/update/delete realizadas a la BD
 * @package App\Http\Controllers
 */
class DBController extends Controller
{
    //TODO

    /**
     * Funcion añade un McServer vinculandolo con el Usuario creador
     * Comprueba que el Usuario no tenga ya un servidor con el mismo nombre en su lista de McServer´s
     * @param Request $request
     */
    function postSaveMinecraftServer(Request $request)
    {
        $user = Auth::user();
        $owner_id = $user->getAuthIdentifier();
        $server_Name = $request->input('mcServerName');
        $ip_Address = $request->input('direccionIP');
        $port_Rcon = $request->input('puertoRCON');
        $password_Rcon = $request->input('passwordRCON');


        $rowsBD = DB::table('mc_servers')->where([
            ['owner_id', '=', $owner_id],
            ['server_Name', '=', $server_Name],
        ])->get();

        if (!isset($rowsBD[0])) {
            DB::table('mc_servers')->insert(
                ['owner_id' => $owner_id, 'server_Name' => $server_Name, 'ip_Address' => $ip_Address,
                    'port_Rcon' => $port_Rcon, 'password_Rcon' => $password_Rcon]
            );
        }

        Log::info('El usuario: ' . $user->id . ' ha añadido un nuevo servidor a su lista');

        return view('profile');

    }

    /**
     * Comprobamos que tenga servidores en su lista y mostramos la lista de servidores o un mensaje en texto plano
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getMyServerList()
    {
        $user = Auth::user();

        $rowsBD = DB::table('mc_servers')->where([
            ['owner_id', '=', $user->getAuthIdentifier()],
        ])->get();

        if (isset($rowsBD[0])) {
            $serverNameList = DB::table('mc_servers')->select('server_Name', 'id')->where('owner_id', '=', $user->getAuthIdentifier())->get();
        } else {
            $serverNameList = "Aun no has añadido ningun servidor a tu lista";
        }


        return view('profile.listMinecraftServer', array('serverList' => $serverNameList));

    }

    /**
     * Obtenemos el id del usuario y el nombre del servidor al que quiere acceder
     * Comprobamos que el servidor pertenece a ese usuario y procedemos a realizar la conexion
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getSelectMinecraftServer(Request $request, $serverName)
    {
        $user = Auth::user();

        //COMPROBAMOS QUE EL USUARIO QUE QUIERE ACCEDER AL SERVIDOR ES EL DUEÑO DEL MISMO
        $rowsBD = DB::table('mc_servers')->where([
            ['owner_id', '=', $user->getAuthIdentifier()],
            ['server_Name', '=', $serverName],
        ])->get();

        if (isset($rowsBD[0])) {
            $queryResult = $rowsBD[0];
            if ($queryResult->owner_id == $user->getAuthIdentifier()) {
                $host = $queryResult->ip_Address;
                $port = $queryResult->port_Rcon;
                $password = $queryResult->password_Rcon;
                $rcon = new Rcon($host, $port, $password);
            }
        } else {
            $error = "Nice try ;)";
            dd($error);
        }

        return ($rcon->connect()) ? view('profile.manageMinecraftServer', array('serverName' => $serverName)) : view('index');


    }
}
