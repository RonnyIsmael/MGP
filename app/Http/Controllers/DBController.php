<?php

namespace App\Http\Controllers;

use App\McServer;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        $userOwnerMcServer = DB::table('mc_servers')->where([
            ['owner_id', '=', $user->getAuthIdentifier()],
            ['id', '=', $mcServerId],
        ])->get();

        if (isset($userOwnerMcServer)) {

        }

        return view('profile.manageMinecraftServer');
    }
}
