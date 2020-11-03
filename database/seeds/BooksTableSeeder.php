<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('ja_JP');
        for ($i=0; $i < 10; $i++) { 

            App\Book::create([
                'user_id' => $faker->numberBetween(1,3),
                'place_id' => $faker->numberBetween(1,3),
                'item_name' => $faker->word(),
                'item_number' => $faker->numberBetween(1,999),
                'item_amount' => $faker->numberBetween(100,5000),
                'item_img' => $faker->word(),
                'published' => $faker->dateTime('now'),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
