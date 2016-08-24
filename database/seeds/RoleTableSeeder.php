<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 2; $i++){
        	DB::table('roles')->insert([
        		'role'        => $faker -> randomElement($array = array ('admin','member')),
        		'created_at'      => $faker-> dateTime
        	]);
        }
    }
}
