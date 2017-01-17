<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		/*  php artisan db:seeder */
        /* Sirve para insertar información a la base de datos */

        DB::table("users")->insert( [
        	"name"=>"Ivan Ramírez",
        	"email"=>"iramirez@fabricadesoluciones.com",
        	"password"=>bcrypt("jabbawockeez"),
        ] );
    }
}
