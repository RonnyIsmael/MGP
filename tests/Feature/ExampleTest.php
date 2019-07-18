<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\DB;
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

        //COMPROBAMOS QUE EL USUARIO QUE QUIERE ACCEDER AL SERVIDOR ES EL DUEÑO DEL MISMO
        $rowsBD = DB::table('users')->where([
            ['email', '=', $user->email],
        ])->get();


        if (isset($rowsBD[0])) {
            $this->assertTrue(true);
            printf("test_create_user(): Logueado exitosamente\n\n");

        } else {
            $this->assertTrue(false);
            printf("test_create_user(): No se ha logueado exitosamente\n\n");
        }



    }


}
