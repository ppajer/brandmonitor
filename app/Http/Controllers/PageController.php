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

    public function seoMonitor(Request $request) {
        $user = \Auth::user();
        $websites = $user->websites()->get();
        $trackers = $user->trackers()->get();
        $keywords = \App\Keyword::whereHas('trackers', function($q) use ($trackers) {
            $q->whereIn('trackers.id', $trackers->map(function($tracker){
                return $tracker->id;
            }));
        })->get();
        return view('seomonitor', ['websites' => $websites, 'trackers' => $trackers, 'keywords' => $keywords]);
    }

    /*
    *   REVIEWS
    */

    public function reviewMonitor(Request $request) {
        return view('reviewmonitor', ['customers' => []]);
    }
}
