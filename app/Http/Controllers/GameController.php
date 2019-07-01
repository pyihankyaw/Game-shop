<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Game;
use App\Platform;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games =Game::paginate();
        return view('games.index',[
            "games" => $games
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $companies = Company::all();
        $platforms = Platform::all();
        return view('games.create', [
            "categories" => $categories,
            "companies" => $companies,
            "platforms" => $platforms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            "name" => "required",
            "year" => "required|numeric|min:1990",
            "category_id" => "required|numeric",
            "company_id" => "required|numeric",
        ]);

        $game = Game::create($request->all());
        $game->platforms()->sync($request->platforms);
        return redirect()->route("games.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $game =  Game::findOrFail($id);
        return view("games.edit", compact("game"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $game = Game::findOrFail($id);
        $game->name = $request->name;
        $game->save();

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('games.index');
    }
}
