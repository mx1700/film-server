<?php

use Illuminate\Http\Request;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_test_token', function() {
    $user = User::find(1);
    $token = $user->createToken('app')->accessToken;
    return ['token' => $token];
});

Route::get('/test', function (Request $request) {
    return ['message' => 'hello world'];
});

Route::get('/films', function () {
    return \App\Film::all();
});

Route::get('/films/{film}', function (\App\Film $film) {
    $ret = $film->toArray();
    $ret['events'] = $film->events()->orderBy('start_time')->get();
    $ret['location_cards'] = $film->locationCards()->orderBy('start_time')->get();
    return $ret;
});

Route::get('/films/{film}/events', function (\App\Film $film) {
    return $film->events()->orderBy('start_time')->get();
});

Route::get('/films/{film}/location-cards', function (\App\Film $film) {
    return $film->locationCards()->orderBy('start_time')->get();
});

Route::post('/feedback', function (Request $request) {
    $content = $request->get('content');
    $platform = $request->get('platform');
    $user = $request->user();
    \App\Feedback::create([
        'content' => $content,
        'user_id' => $user ? $user->id : 0,
        'platform' => $platform,
    ]);
});

Route::get('/help_info', function() {
    return \App\SiteConfig::helpInfo();
});

//Route::get('/user', function() {
//    return Auth::user();
//});