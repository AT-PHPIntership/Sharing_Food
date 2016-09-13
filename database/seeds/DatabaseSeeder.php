<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlaceTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RatingTableSeeder::class);
        $this->call(FoodStoreTableSeeder::class);
        $this->call(FoodTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(ImageTableSeeder::class);
    }
}
