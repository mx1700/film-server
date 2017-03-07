<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\SiteConfig;
use Illuminate\Http\Request;

class FeedbackController extends Controller
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
        $feedback = Feedback::orderBy('id', 'desc')->paginate(15);
        return view('feedback', ['feedback' => $feedback]);
    }
}
