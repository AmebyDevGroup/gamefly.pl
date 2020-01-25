<?php


namespace App\Http\Controllers\Frontend;

use App\FrontUser;
use App\Game;
use App\GamesCategory;
use App\GamesTag;
use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureEmailIsVerified;
use App\Http\Middleware\FrontAuthenticate;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use PDOException;


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(FrontAuthenticate::class)->only('userProfile', 'reservateView', 'reservate');
        $this->middleware(EnsureEmailIsVerified::class)->only('reservateView', 'reservate');
    }

    public function userProfile()
    {
        return view('frontend.profile', ['user' => auth()->user()]);
    }

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

    public function setRate(Request $request, GamesCategory $category, Game $game)
    {
        $user = auth()->user();
        if ($user) {
            if ($game->rates()->where('front_user_id', $user->id)->count() > 0) {
                return response()->json(['success' => false, 'message' => 'Dodałeś już ocenę dla tej gry!']);
            }
            try {
                $game->rates()->create([
                    'front_user_id' => $user->id,
                    'rate' => $request->value
                ]);
                return response()->json(['success' => true, 'message' => 'Pomyślnie dodano Twoją ocenę']);
            } catch (Exception $e) {
                $message = $e->getMessage();
                if ($e->getPrevious()) {
                    $message = $e->getPrevious()->getMessage();
                }
                return response()->json(['success' => false, 'message' => $message]);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Tylko zalogowani mogą oceniać gry!']);
        }
    }

    public function reservateView(Request $request, GamesCategory $category, Game $game)
    {
        if ($request->game_id == $game->id) {
            if ($game->items()->where('loaned', 0)->count() > 0) {
                $user = auth()->user();
                if ($user) {
                    if (!in_array($game->id, $user->games()->where('expired', 0)->pluck('game_id')->toArray())) {
                        return view('frontend.reservate', ['category' => $category, 'game' => $game]);
                    }
                    return redirect()->route('Front::game', [$category, $game])->withMessage('danger',
                        "Masz już tą grę w swojej bibliotece!");
                }
                abort(401);
            }
        }
        abort(403);
    }

    public function reservate(Request $request, GamesCategory $category, Game $game, FrontUser $user)
    {
        $authUser = auth()->user();
        if ($authUser->id == $user->id) {
            if (!in_array($game->id, $user->games()->where('expired', 0)->pluck('game_id')->toArray())) {
                DB::beginTransaction();
                try {
                    $copy = $game->items()->where('loaned', 0)->lockForUpdate()->first();
                    $copy->loaned = 1;
                    $copy->save();
                    $user->games()->attach($copy, [
                        'key' => $copy->serial(),
                        'price' => $game->price,
                        'expired_at' => Carbon::parse($request->expired_at . " 16:00:00"),
                    ]);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return redirect()->route('Front::profile')->withMessage('success',
                    "Dodano grę do biblioteki!");
            }
            return redirect()->route('Front::game', [$category, $game])->withMessage('danger',
                "Masz już tą grę w swojej bibliotece!");
        }
        abort(401);
    }

}
