<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namas = ['Action', 'Horror', 'Thriller', 'Romance', 'Comedy'];
        foreach($namas as $nama){
           $category = Category::create([
                'Name' => $nama 
            ]);
    }
}
}
