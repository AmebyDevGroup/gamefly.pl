<?php

namespace App\Http\Controllers\Backend;

use App\GamesCategory;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = GamesCategory::paginate(10);
        return view('backend.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.categories.create');
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
            GamesCategory::create(array_merge($request->all(), ['slug' => Str::slug($request->name)]));
            return redirect()->route('App::categories.index')->withMessage('success',
                'Dodano pomyślnie dodano kategorie');
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
//        return view('backend.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(GamesCategory $category)
    {
        return view('backend.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, GamesCategory $category)
    {
        try {
            $category->update(array_merge($request->all(), ['slug' => Str::slug($request->name)]));
            return redirect()->route('App::categories.index')->withMessage('success',
                'Pomyślnie edytowano kategorie ' . $category->name);
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
    public function destroy(GamesCategory $category)
    {
        $category->delete();
        return redirect()->back()->withMessage('success', 'Element usunięty');
    }
}
