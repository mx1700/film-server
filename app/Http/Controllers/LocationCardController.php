<?php

namespace App\Http\Controllers;

use App\LocationCard;
use Illuminate\Http\Request;
use App\Film;

class LocationCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Film $film
     * @return \Illuminate\Http\Response
     */
    public function index(Film $film)
    {
        $cards = $film->locationCards()->orderBy('start_time')->get();
        return View('card.index', ['cards' => $cards, 'film' => $film]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Film $film
     * @return \Illuminate\Http\Response
     */
    public function create(Film $film)
    {
        return view('card.edit', ['film' => $film, 'card' => new LocationCard()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Film $film
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Film $film, Request $request)
    {
        //TODO:校验
        $input = $request->all();
        $input['film_id'] = $film->id;
        LocationCard::create($input);
        return redirect()->route('locationCards.index', ['film' => $film->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Film $film
     * @param LocationCard $locationCard
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Film $film, LocationCard $locationCard)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Film $film
     * @param LocationCard $locationCard
     * @return \Illuminate\Http\Response
     * @internal param LocationCard $card
     */
    public function edit(Film $film, LocationCard $locationCard)
    {
        return view('card.edit', ['film' => $film, 'card' => $locationCard ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Film $film
     * @param LocationCard $locationCard
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Film $film, LocationCard $locationCard)
    {
        //TODO:校验
        $input = $request->all();
        $locationCard->fill($input);
        $locationCard->save();
        return redirect()->route('locationCards.index', ['film' => $film->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Film $film
     * @param LocationCard $locationCard
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Film $film, LocationCard $locationCard)
    {
        $locationCard->delete();
        return redirect()->route('locationCards.index', ['film' => $film->id]);
    }
}
