<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2018/1/2
 * Time: 下午12:04
 */

namespace App\Http\Controllers;


use Illuminate\View\View;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }
}