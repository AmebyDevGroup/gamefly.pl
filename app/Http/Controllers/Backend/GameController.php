<?php

namespace App\Http\Controllers\Backend;

use App\Game;
use App\Http\Controllers\Controller;
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
        $games = Game::paginate(10);
        return view('backend.games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.games.create');
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
            Game::create(array_merge($request->all(), ['slug' => Str::slug($request->name)]));
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
        return view('backend.games.edit', ['game' => $game]);
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
            $game->update(array_merge($request->all(), ['slug' => Str::slug($request->name)]));
            return redirect()->route('App::categories.index')->withMessage('success',
                'Pomyślnie edytowano kategorie ' . $game->name);
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
        $game->delete();
        return redirect()->back()->withMessage('success', 'Element usunięty');
    }
}
