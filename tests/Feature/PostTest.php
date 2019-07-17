<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /*    public function test_post_logout_without_user_login()
        {
            $response = $this->post('/logout');
            $this->assertTrue(true);
            printf("test_post_logout_without_user_login(): No se ha permitido POST al end point /logout si el usuario no ha iniciado sesión\n\n");
        }

            public function test_post_logout_with_user_login()
        {
            //Hacemos login
            $this->post('/login', [
                'email' => "root@lolshark.es",
                'password' => "admin",
            ]);

            $this->get('/home');

            $response = $this->post('/logout');

            printf("Se ha realizado la llamada POST al end point /logout con un usuario loguado");
        }*/

    public function test_post_select_minecraft_server()
    {
        //Hacemos login
        $this->post('/login', [
            'email' => "root@lolshark.es",
            'password' => "admin",
        ]);

        $response = $this->withHeaders([
        ])->json('POST', '/selectMinecraftServer', ['id' => 1]);

        $response->dump();
    }
}
