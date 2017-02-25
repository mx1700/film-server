<?php

namespace App\Http\Controllers;

use App\Event;
use App\Film;
use Illuminate\Http\Request;

class EventController extends Controller
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
        //dd($film->events()->get()->toArray());
        $events = $film->events()->orderBy('start_time')->get();
        return View('event.index', ['events' => $events, 'film' => $film]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Film $film
     * @return \Illuminate\Http\Response
     */
    public function create(Film $film)
    {
        return view('event.edit', ['film' => $film, 'event' => new Event()]);
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
        Event::create($input);
        return redirect()->route('events.index', ['film' => $film->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Film $film
     * @param Event $event
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Film $film, Event $event)
    {
        return view('event.edit', ['film' => $film, 'event' => $event ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Film $film
     * @param Event $event
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Film $film, Event $event)
    {
        //TODO:校验
        $input = $request->all();
        $event->fill($input);
        $event->save();
        return redirect()->route('events.index', ['film' => $film->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Film $film
     * @param Event $event
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Film $film, Event $event)
    {
        $event->delete();
        return redirect()->route('events.index', ['film' => $film->id]);
    }
}
