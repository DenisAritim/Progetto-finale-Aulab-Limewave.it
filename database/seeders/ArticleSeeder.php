<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $faker = Faker::create();
        
        $categories = Category::all();
        
        foreach ($categories as $category) {
            // $category_id = $category->id;
            $num_announcements = rand(0, 8);
        
            for ($i = 0; $i < $num_announcements; $i++) {
                Article::create([
                    'title' => $faker->words($faker->numberBetween(2, 10), true),
                    'price' => $faker->randomFloat(2, 10, 1000),
                    'body' => $faker->text(rand(30, 200)),
                    'user_id' => rand(1, 4),
                    'category_id' => $category->id,
                    'is_accepted' => [0, 1, null][rand(0, 2)]
                ]);
            }
        }
    }
}
