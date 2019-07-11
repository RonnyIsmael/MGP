<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Esta clase es la main desde aquí se llaman a los seeders que creamos desde php artisan
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(TesteoDatosDB::class);

    }
}
