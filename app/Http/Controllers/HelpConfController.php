<?php

namespace App\Http\Controllers;

use App\SiteConfig;
use Illuminate\Http\Request;

class HelpConfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helps = SiteConfig::helpInfo();
        return view('conf.help', ['helps' => $helps]);
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $images = $input['help_image'];
        $contents = $input['help_content'];
        $help = array_map(function($i) use($images, $contents) {
            return [
                'image_url' => $images[$i],
                'content' => $contents[$i]
            ];
        }, range(0, 4));
        SiteConfig::helpInfo($help);
        $request->session()->flash('message', '保存成功!');
        return redirect()->route('conf.help');
    }
}
