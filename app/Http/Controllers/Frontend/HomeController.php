<?php


namespace App\Http\Controllers\Frontend;

use App\Game;
use App\GamesCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getCategory(GamesCategory $category)
    {
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
        dd('aaa', $category, $category->games);
    }
}
