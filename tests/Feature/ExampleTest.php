<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ExampleTest extends TestCase
{
    public function test_create_user()
    {
        //Creamos un usuario
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'phpunit'),
        ]);

        //Hacemos login
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($user);

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/serverList');
        $response->assertOk();

        printf("test_create_user(): Logueado exitosamente\n\n");

    }


}
