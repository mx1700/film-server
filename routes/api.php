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

/*
 * 只加 middleware('auth:api') 后
 * $request->user() 和 Auth::user 都能获取当前用户，但是如果鉴权失败会报错鉴权失败
 *
 * 不加 auth 中间件，又想获取用户可以两种方式
 * 1. Auth::guard('api')->user();
 * 2. Auth::shouldUse('api'); $request->user();
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_test_token', function() {
    $user = User::find(1);
    $token = $user->createToken('app')->accessToken;
    return ['token' => $token];
});

Route::get('/weixin_login', function (Request $request) {
    //https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421140842
    $code = $request->get('code');
    $user = \App\Weixin::login($code);
    return $user;
});

Route::get('/test', function (Request $request) {
    return ['message' => 'hello world'];
});

Route::get('/films', function () {
    return \App\Film::orderBy('sort', 'desc')->orderBy('id', 'desc')->get();
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

Route::get('/events/{event}/barrages', function (\App\Event $event) {
    $list = $event->barrages()->orderBy('id')->get()->toArray();
    if(count($list) == 0) return [];
    $box = array_chunk($list, 8);
    $result = $box[rand(0, count($box) - 1)];
    usort($result, function($a, $b) {
        return $a['time'] - $b['time'];
    });
    return $result;
});

Route::get('/help_info', function() {
    return \App\SiteConfig::helpInfo();
});

//Route::get('/user', function() {
//    return Auth::user();
//});