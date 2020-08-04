<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \ppajer\SearchResults;

class SEOMonitorController extends Controller
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

    public function index(Request $request) {
        $user = \Auth::user();
        $websites = $user->websites()->get();
        $trackers = $user->trackers()->get();
        $keywords = \App\Keyword::whereHas('trackers', function($q) use ($trackers) {
            $q->whereIn('trackers.id', $trackers->map(function($tracker){
                return $tracker->id;
            }));
        })->get();
        return view('seomonitor.index', ['websites' => $websites, 'trackers' => $trackers, 'keywords' => $keywords]);
    }

    public function explore() {
        return view('seomonitor.explore.index');
    }

    public function exploreKeyword(Request $request) {
        $request->validate([
            'keyword' => 'required',
            'location' => 'required'
        ]);

        $serps = new SearchResults([
            'query' => $request->get('keyword'),
            'location' => $request->get('location')
        ]);

        return view('seomonitor.explore.keyword', [
            'keyword' => $request->get('keyword'),
            'location' => $request->get('location'),
            'results' => $serps->get()
        ]);
    }

    public function exploreWebsite(Request $request) {
        $request->validate([
            'domain' => 'required'
        ]);
    }
}
