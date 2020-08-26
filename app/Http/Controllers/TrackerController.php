<?php

namespace App\Http\Controllers;

use App\Tracker;
use App\Website;
use Illuminate\Http\Request;


class TrackerController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = \Auth::user();
        return view('tracker.create', ['websites' => $user->websites()->get(), 'return' => $request->get('return') ?? '/trackers']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'keywords' => 'required',
                'website' => 'required|not_in:-1',
                'location' => 'required'
            ]);

        array_map(function($keyword) use ($request) {
            $tracker = new Tracker();
            $tracker->keyword()->associate(
                KeywordController::findOrCreate(
                    trim($keyword), 
                    $request->get('location')
                )
            );
            $tracker->user()->associate(\Auth::user());
            $tracker->website()->associate(Website::find($request->get('website')));
            $tracker->save();
        }, explode(',', $request->keywords));

        return redirect($request->get('redirect_to'))->with('success', 'Keywords successfully tracked! Check back later to see the first results, or update them now.');
    }

    public function scrapeAll(Request $request) {
        $count = Tracker::where('user_id', \Auth::user()->id)->get()->reduce(function($count, $tracker) {
            return $count + $this->scrape($tracker);
        }, 0);

        return redirect($request->get('return') ?? '/seo-monitor')->with('success', "Successfully updated $count keywords.");
    }

    private function scrape(Tracker $tracker) {
        array_map(function($serp) use ($tracker) {
            // Don't create duplicates
            if (SERPController::findFromScrapeResult($serp, $tracker)->count()) {
                return;
            }
            SERPController::createFromScrapeResult($serp, $tracker);
        }, $tracker->get());
        
        return 1;
    }
}
