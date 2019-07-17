<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\McServer;

class TesteoDatosDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'root',
            'email' => 'root@lolshark.es',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'root2',
            'email' => 'root2@lolshark.es',
            'password' => bcrypt('admin'),
        ]);

        DB::table('mc_servers')->insert([
            'id' => 1,
            'owner_id' => 1,
            'server_Name' => 'TP-Server',
            'ip_Address' => '82.223.5.120',
            'port_Rcon' => 25575,
            'password_Rcon' => 'Qj1jhHYRN78pMjutWem64YiX43V0u1',
        ]);

        DB::table('mc_servers')->insert([
            'id' => 2,
            'owner_id' => 2,
            'server_Name' => 'MC-Server',
            'ip_Address' => '82.223.5.120',
            'port_Rcon' => 25575,
            'password_Rcon' => 'Qj1jhHYRN78pMjutWem64YiX43V0u1',
        ]);

    }
}
