<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PrincipalController extends Controller
{
    //TODO
    function getIndex()
    {
        return view('index');
    }

    function getMinecraftGenerateProperties()
    {
        return view('minecraft-generate-properties.mgps-select-version');
    }

    function getPerfilUsuario()
    {
        return Auth::user() ? view('profile') : view('index');
    }

    function getAddMinecraftServer($id)
    {

        dd($id);

        if (Auth::user() && !is_null($id)) {

        }
        return view('profile.addMinecraftServer');
    }


}
