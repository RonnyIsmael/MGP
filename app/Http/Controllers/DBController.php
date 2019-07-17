<?php

namespace App\Http\Controllers;

use App\McServer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use Thedudeguy\Rcon;


class DBController extends Controller
{
    //TODO

    /**
     * Funcion para guardar en la base de datos table mc_servers los datos de un servidor de minecraft
     * @param Request $request
     */
    function postSaveMinecraftServer(Request $request)
    {
        $user = Auth::user();

        $mcServer = new McServer();
        $mcServer->owner_id = $user->getAuthIdentifier();
        $mcServer->server_Name = $request->input('mcServerName');
        $mcServer->ip_Address = $request->input('direccionIP');
        $mcServer->port_Rcon = $request->input('puertoRCON');
        $mcServer->password_Rcon = $request->input('passwordRCON');
        $mcServer->save();

        return view('profile');

    }

    function getMyServerList()
    {
        $user = Auth::user();

        $serverNameList = DB::table('mc_servers')->select('server_Name', 'id')->where('owner_id', '=', $user->getAuthIdentifier())->get();

        return view('profile.listMinecraftServer', array('serverList' => $serverNameList));

    }

    function postSelectMinecraftServer(Request $request)
    {
        $user = Auth::user();
        $mcServerId = $request->input('id');

        //COMPROBAMOS QUE EL USUARIO QUE QUIERE ACCEDER AL SERVIDOR ES EL DUEÑO DEL MISMO
        $rowsBD = DB::table('mc_servers')->where([
            ['owner_id', '=', $user->getAuthIdentifier()],
            ['id', '=', $mcServerId],
        ])->get();

        if (isset($rowsBD)) {
            $queryResult = $rowsBD[0];
            if ($queryResult->owner_id == $user->getAuthIdentifier()) {
                $host = $queryResult->ip_Address;
                $port = $queryResult->port_Rcon;
                $password = $queryResult->password_Rcon;
                $rcon = new Rcon($host, $port, $password);
            }
        }

        return ($rcon->connect()) ? view('profile.manageMinecraftServer', array('mcServerId' => $mcServerId)) : view('index');


    }
}
