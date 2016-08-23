<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
        	DB::table('users')->insert([
        		'username'        => $faker-> username,
        		'email'     	  => $faker-> email,  
        		'password'        => bcrypt('12345tp'),
        		'avatar'          => $faker-> image, 
        		'fullname'        => $faker-> name,
        		'address'		  => $faker-> address,
        		'birthday'        => $faker-> date,
        		'phone'           => $faker-> phonenumber,
        		'information'     => $faker-> text,
        		'role_id'   	  => rand(1,2),
        		'types_id'   	  => rand(1,10),
        		'created_at'      => $faker-> dateTime
        	]);
        }
    }
}
