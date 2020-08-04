<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function index () {
        return view('welcome');
    }

    public function comingsoon () {
        return view('comingsoon');
    }

    /*
    *   SEO
    */

    // Moved to SEOMonitorController

    /*
    *   REVIEWS
    */

    public function reviewMonitor(Request $request) {
        return view('reviewmonitor.index', ['customers' => []]);
    }
}
