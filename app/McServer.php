<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class McServer extends Model
{
    //Definicion del modelo Minecraft Server
    protected $table = 'mc_servers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;

    public $id;
    public $owner_id;
    public $server_Name;
    public $ip_Address;
    public $port_Rcon;
    public $password_Rcon;

    public static function getMyServerList($query, $value)
    {
        return $query->where('owner_id', $value);
    }

}
