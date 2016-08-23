<?php

use Illuminate\Database\Seeder;

class FoodStoreTableSeeder extends Seeder
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
        	DB::table('food_stores')->insert([
        		'name'        => $faker-> name,
        		'information'     => $faker-> text,
        		'users_id'   	  => rand(1,10),
        		'created_at'      => $faker-> dateTime
        	]);
        }
    }
}
