<?php

use Illuminate\Database\Seeder;

class RatingTableSeeder extends Seeder
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
        	DB::table('ratings')->insert([
        		'rating'        => rand(1,5),
        		'created_at'      => $faker-> dateTime
        	]);
        }
    }
}
