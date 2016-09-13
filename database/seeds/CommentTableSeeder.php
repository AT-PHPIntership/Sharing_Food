<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
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
        	DB::table('comments')->insert([
        		'body'     => $faker-> text,
        		'users_id'   	  => rand(1,10),
        		'ratings_id'	  => rand(1,5),
                'foods_id'         => rand(1,10),
        		'created_at'      => $faker-> dateTime
        	]);
        }    }
}
