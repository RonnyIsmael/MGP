<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\File;


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

    function getMinecraftGeneratePropertiesView($version)
    {
        $versionFormated = str_replace(".", "-", $version);

        return view('minecraft-generate-properties.mgp.' . $versionFormated);
    }

    function getPerfilUsuario()
    {
        return Auth::user() ? view('profile') : view('index');
    }

    function getAddMinecraftServer()
    {

        return view('profile.addMinecraftServer');
    }

    /**
     *Este endpoint devuelve un fichero de texto con las versiones de Minecraft disponibles
     *
     */
    function getVersions()
    {
        $file = fopen(storage_path("app/public/versions.txt"), "r");
        while (!feof($file)) {
            echo fgets($file);
        }
        fclose($file);

    }


}
