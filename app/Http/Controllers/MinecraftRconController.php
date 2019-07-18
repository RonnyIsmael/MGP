<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Thedudeguy\Rcon;

class MinecraftRconController extends Controller
{
    //TODO

    public function PostSendCommand(Request $request)
    {
        $user = Auth::user();
        $serverName = $request->input('serverName');

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

        $rcon->connect();

        $rcon->sendCommand($request->input('cmd'));

    }
}
