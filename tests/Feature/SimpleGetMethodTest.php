<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SimpleGetMethodTest extends TestCase
{

    public function test_get_index_without_user()
    {
        $response = $this->get('/');
        $response->assertOk();
        printf("test_get_index_without_user(): Realizado correctamente GET /index \n");

    }

    public function test_get_login_without_user()
    {
        $response = $this->get('/login');
        $response->assertOk();
        printf("test_get_login_without_user(): Realizado correctamente GET /login \n");
    }

    public function test_get_mgp_without_user()
    {
        $response = $this->get('/mgp');
        $response->assertOk();
        printf("test_get_mgp_without_user(): Realizado correctamente GET /mgp \n");
    }

    public function test_get_home_without_user()
    {
        $response = $this->get('/home');
        $response->assertLocation('/');
        printf("test_get_home_without_user(): Realizado correctamente GET /home sin usuario logueado y fué redirigido a /index \n");
    }

    public function test_get_home_with_user()
    {
        //Hacemos login
        $this->post('/login', [
            'email' => "root@lolshark.es",
            'password' => "admin",
        ]);

        $response = $this->get('/home');
        $response->assertLocation('/');
        printf("test_get_home_without_user(): Realizado correctamente GET /home con usuario logueado\n");
    }

    public function test_get_password_reset_without_user()
    {
        $response = $this->get('/password/reset');
        $response->assertOk();
        printf("test_get_password_reset_without_user(): Realizado correctamente GET /password/reset sin usuario logueado \n");
    }


    public function test_get_profile_with_user()
    {
        //Hacemos login
        $this->post('/login', [
            'email' => "root@lolshark.es",
            'password' => "admin",
        ]);

        $response = $this->get('/profile');
        $response->assertOk();
        printf("test_get_profile_with_user(): Realizado correctamente GET /profile con usuario logueado \n");
    }

    public function test_get_register_without_user()
    {
        $response = $this->get('/register');
        $response->assertLocation('/');
        printf("test_get_register_without_user(): Realizado correctamente GET /register sin usuario logueado\n");
    }

    public function test_get_register_with_user()
    {
        //Hacemos login
        $this->post('/login', [
            'email' => "root@lolshark.es",
            'password' => "admin",
        ]);

        $response = $this->get('/register');
        $response->assertLocation('/home');
        printf("test_get_register_with_user(): Realizado correctamente GET /register con usuario logueado \n");
    }

    public function test_get_serverList_minecraft()
    {
        //Hacemos login
        $this->post('/login', [
            'email' => "root@lolshark.es",
            'password' => "admin",
        ]);

        $response = $this->get('/serverList');
        $response->assertOk();
        printf("test_get_serverList_minecraft(): Realizado correctamente GET /serverList con usuario logueado \n");
    }


}
