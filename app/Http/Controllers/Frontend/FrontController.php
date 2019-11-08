<?php


namespace App\Http\Controllers\Frontend;

use App\Game;
use App\GamesCategory;
use App\GamesTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PDOException;


class FrontController extends Controller
{
    public function getCategory(GamesCategory $category)
    {
        $category->load('games.category', 'games.media');
        View::share('currentCategory', $category);
        return view('frontend.category', ['category' => $category]);
    }

    public function getGame(GamesCategory $category, Game $game)
    {
        View::share('currentCategory', $category);
        View::share('currentGame', $game);
        return view('frontend.game', ['category' => $category, 'game' => $game]);
    }

    public function getGamesBySearch(Request $request)
    {
        $games = collect([]);
        if ($request->s != '') {
            $search = '%' . $request->s . '%';
            $games = Game::with('category', 'media')->where(function ($q) use ($search) {
                $q->where('name', 'like', $search);
                $q->orWhere('introtext', 'like', $search);
                $q->orWhere('fulltext', 'like', $search);
            })->get();
        }
        return view('frontend.search', ['games' => $games, 'search' => $request->s]);
    }

    public function getGamesWithTag(GamesTag $tag)
    {
        $tag->load('games.category', 'games.media');
        return view('frontend.category', ['category' => $tag]);
    }
}
