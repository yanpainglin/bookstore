<?php

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for($i=0; $i<5; $i++) {
            $category = new App\Category();
            $category->name = ucwords( $faker->word );
            $category->save();
        }
    }
}
