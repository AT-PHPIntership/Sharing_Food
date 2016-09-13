<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
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
        	DB::table('foods')->insert([
        		'name_food'       => $faker-> name,
        		'introduce'       => $faker-> text,  
        		'accept'          => rand(0,1),
        		'place_food_id'   => rand(1,10), 
        		'types_id'        => rand(1,10),
        		'users_id'		  => rand(1,10),
        		'food_store_id'   => rand(1,10),
        		'created_at'      => $faker-> dateTime
        	]);
        }
    }
}
