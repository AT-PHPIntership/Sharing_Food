<?php

use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
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
        	DB::table('places')->insert([
        		'place'        => $faker-> name,
        		'created_at'      => $faker-> dateTime
        	]);
        }
    }
}
