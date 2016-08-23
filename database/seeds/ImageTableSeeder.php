<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
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
        	DB::table('images')->insert([
        		'image'          => $faker-> image, 
        		'foods_id'   	  => rand(1,10),
        		'created_at'      => $faker-> dateTime
        	]);
        }
    }
}
