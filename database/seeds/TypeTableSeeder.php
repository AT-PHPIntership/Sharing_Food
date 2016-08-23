<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
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
        	DB::table('types')->insert([
        		'type'        => $faker-> name,
        		'created_at'      => $faker-> dateTime
        	]);
        }
    }
}
