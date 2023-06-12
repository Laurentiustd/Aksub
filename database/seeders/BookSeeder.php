<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id ID');
        for($i = 0; $i<5; $i++){
            Book::create([
                'Title' => $faker->words(3, true),
                'Author' => $faker->name,
                'ReleaseDate' => $faker->date($format = 'Y-m-d'),
                'Quantity'=>$faker->numberBetween($min = 1, $max = 100),
                'Price'=>$faker->numberBetween($min = 1000, $max = 100000),
                'Image'=>$faker->imageUrl($width = 640, $height = 480),
                'category_id'=>$faker->numberBetween($min = 1, $max = 5)
            ]);
        };
    }
}
