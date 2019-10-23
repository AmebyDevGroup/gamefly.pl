<?php


namespace App\Http\Controllers\Frontend;

use App\Game;
use App\GamesCategory;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function getCategory(GamesCategory $category)
    {
//        $category->games()->create([
//            'ordering' => 1,
//            'code' => 'fifa_20',
//            'name' => 'FIFA 20',
//            'slug' => 'fifa-20',
//            'description' => '',
//            'price' => '159.99',
//            'active' => 1,
//            'preorder' => 0,
//            'sale' => 0
//        ]);
//        $category->games()->create([
//            'ordering' => 1,
//            'code' => 'fifa_19',
//            'name' => 'FIFA 19',
//            'slug' => 'fifa-19',
//            'description' => '',
//            'price' => '129.99',
//            'active' => 1,
//            'preorder' => 0,
//            'sale' => 0
//        ]);
//        $category->games()->create([
//            'ordering' => 1,
//            'code' => 'fifa_18',
//            'name' => 'FIFA 18',
//            'slug' => 'fifa-18',
//            'description' => '',
//            'price' => '59.99',
//            'active' => 1,
//            'preorder' => 0,
//            'sale' => 0
//        ]);
        $category->load('games');
        return view('frontend.category', ['category' => $category]);
    }

    public function getGame(GamesCategory $category, Game $game)
    {
        return view('frontend.game', ['category' => $category, 'game' => $game]);
    }
}
