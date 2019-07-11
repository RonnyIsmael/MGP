<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
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


	

	printf("Logueado exitosamente");
	
	}
	
	public function test_listar_servidores_minecraft()
	{

		//Hacemos login
		$response = $this->post('/login', [
			'email' => "root@lolshark.es",
			'password' => "admin",
		]);

		$response = $this->get('/profile');
		$response->assertOk();
		$response = $this->get('/serverList');
		$response->assertOk();
		$response->dump();
	}

}
