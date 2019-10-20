<?php

use App\GamesCategory;
use Illuminate\Database\Seeder;

class GamesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Akcja',
            'Logiczne',
            'MMO',
            'Niezależne',
            'Platformówka',
            'Przygodowe',
            'RPG',
            'Sci-Fi',
            'Sportowe',
            'Strategie',
            'Strzelanki',
            'Symulatory',
            'Wyścigi',
            'Zręcznościowe'
        ];
        foreach ($categories as $category) {
            GamesCategory::firstOrCreate([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => ""
            ]);
        }
    }
}
