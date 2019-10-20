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
            'FPP',
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
            'Symulacje',
            'Symulatory lotu',
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
