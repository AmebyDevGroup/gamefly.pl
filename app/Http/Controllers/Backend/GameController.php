<?php

namespace App\Http\Controllers\Backend;

use App\Game;
use App\GamesCategory;
use App\GamesTag;
use App\Http\Controllers\Controller;
use App\Pegi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $games = Game::with('category')->paginate(10);
        return view('backend.games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = GamesCategory::orderBy('name')->get();
        $pegi = Pegi::all();
        return view('backend.games.create', ['categories' => $categories, 'pegi' => $pegi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $game = Game::create(array_merge($request->all(), ['slug' => Str::slug($request->name), 'ordering' => 0]));
            if ($request->file('poster', null) != null) {
                $game->clearMediaCollection('poster');
                $game->addMediaFromRequest('poster')->toMediaCollection('poster');
            }
            $game->addTags($request->tags);
            $game->addItems($request->items);
            return redirect()->route('App::games.index')->withMessage('success', 'Dodano pomyślnie gre');
        } catch (Exception $e) {
            $message = $e->getMessage();
            if ($e->getPrevious()) {
                $message = $e->getPrevious()->getMessage();
            }
            return redirect()->back()->withInput(Input::all())->withMessage('danger', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Game $game)
    {
        $categories = GamesCategory::orderBy('name')->get();
        $pegi = Pegi::all();
        return view('backend.games.edit', ['game' => $game, 'categories' => $categories, 'pegi' => $pegi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Game $game)
    {
        try {
            $game->update(array_merge($request->except('tags', 'items'), ['slug' => Str::slug($request->name)]));
            if ($request->file('poster', null) != null) {
                $game->clearMediaCollection('poster');
                $game->addMediaFromRequest('poster')->toMediaCollection('poster');
            }
            $game->addTags($request->tags);
            $game->addItems($request->items);
            return redirect()->route('App::games.index')->withMessage('success',
                'Pomyślnie edytowano gre ' . $game->name);
        } catch (Exception $e) {
            $message = $e->getMessage();
            if ($e->getPrevious()) {
                $message = $e->getPrevious()->getMessage();
            }
            return redirect()->back()->withInput(Input::all())->withMessage('danger', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Game $game)
    {
        $game->slug = time() . '_' . $game->slug;
        $game->save();
        $game->delete();
        return redirect()->back()->withMessage('success', 'Element usunięty');
    }


    public function getTags(Request $request)
    {
        $tags = GamesTag::where('slug', 'like', '%' . Str::slug($request->search) . '%')->get()->pluck('name');
        return response()->json($tags);
    }
}
