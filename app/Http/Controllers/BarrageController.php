<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/9/16
 * Time: 16:36
 */

namespace App\Http\Controllers;

use App\Barrage;
use App\Event;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BarrageController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $barrages = $event->barrages()->orderBy('id')->get()->toArray();
        $padding = 24 - count($barrages);
        for($i = 0; $i < $padding; $i++) {
            $barrages[] = ['time' => '', 'content' => ''];
        }
        foreach($barrages as &$barrage) {
            $barrage['time'] = self::timespanToTime($barrage['time']);
        }
        return View('barrage.index', ['barrages' => $barrages, 'event' => $event]);
    }

    public function store(Event $event, Request $request)
    {
        $post = $request->all();
        $times = $post['time'];
        $contents = $post['content'];
        $event->barrages()->delete();
        for($i = 0; $i < count($times); $i++) {
            $time = $times[$i];
            $content = $contents[$i];
            if($time && $content) {
                Barrage::create([
                    'event_id' => $event->id,
                    'user_id' => 0,
                    'time' => self::timeToTimespan($time),
                    'content' => $content
                ]);
            }
        }
        $request->session()->flash('message', '保存成功!');
        return redirect()->route('barrages.index', ['event' => $event->id]);
    }

    static function timeToTimespan($time)
    {
        $items = explode(":", $time);
        return $items[0] * 3600 + $items[1] * 60 + $items[2];
    }

    static function timespanToTime($timespan)
    {
        if (!$timespan) return '';
        $s = $timespan % 60;
        $timespan -= $s;
        $m = ($timespan % 3600) / 60;
        $timespan -= $m * 60;
        $h = $timespan / 3600;
        return sprintf("%02d:%02d:%02d", $h, $m, $s);
    }
}