<?php

namespace App\Http\Controllers;

use App\Film;
use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::orderBy('sort', 'desc')->orderBy('id', 'desc')->get();
        return view('film.index', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('film.edit', ['film' => new Film()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['cover'] = Helper::coverUpYunUrl($input['cover']);
        $this->validator($input)->validate();

        Film::create($input);
        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('film.edit', [ 'film' => $film ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $input = $request->all();
        $input['cover'] = Helper::coverUpYunUrl($input['cover']);
        $this->validator($input)->validate();

        $film->fill($input);
        $film->save();
        return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = [
            'required' => '不能为空',
            'numeric' => '必须是数字',
            'time' => '时间格式不正确',
            'releaseDate' => '上映时间格式不正确',
            'sort' => '排序必须是数字',
        ];

        return Validator::make($data, [
            'name' => 'required',
            'cover' => 'required',
            'runtime' => 'required|time',
            'introduction' => 'required',
            'tips' => 'required',
            'releaseDate' => 'date',
        ], $message);
    }
}
