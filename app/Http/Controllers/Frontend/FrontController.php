<?php


namespace App\Http\Controllers\Frontend;

use App\Game;
use App\GamesCategory;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function getCategory(GamesCategory $category)
    {
        $category->load('games');
//        $category->games()->create([
//            'ordering' => 1,
//            'code' => 'fifa_19',
//            'name' => 'FIFA 19',
//            'slug' => 'fifa-19',
//            'description' => '',
//            'price' => '159.99',
//            'active' => 1,
//            'preorder' => 0,
//            'sale' => 0
//        ]);
        return view('frontend.category', ['category' => $category]);
        dd('aaa', $category, $category->games);
    }
}
