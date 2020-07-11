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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        foreach (explode(',', $request->keywords) as $keyword) {
            $tracker = new Tracker([
                'location' => $request->get('location')
            ]);
            $tracker->keyword()->associate($this->findOrCreateKeyword(trim($keyword), $tracker->location));
            $tracker->user()->associate(\Auth::user());
            $tracker->website()->associate(Website::find($request->get('website')));
            $tracker->save();
        }

        return redirect($request->get('redirect_to'))->with('success', 'Keywords successfully tracked! Check back later to see the first results, or update them now.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function show(Tracker $tracker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracker $tracker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracker $tracker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracker $tracker)
    {
        //
    }

    private function saveResult($serps, $tracker) {
        $count = 0;
        foreach ($serps as $serp) {
            $model = SERPController::createFromScrapeResult($serp, $tracker);
            $model->save();
            $count++;
        }
        return $count;
    }

    public function scrapeAll(Request $request) {
        $count = Tracker::where('user_id', \Auth::user()->id)->get()->reduce(function($count, $tracker) {
            $count += $this->saveResult($tracker->scrape(), $tracker);
            return $count;
        }, 0);

        return redirect($request->get('return') ?? '/seo-monitor')->with('success', "Successfully updated $count keywords.");
    }

    public function scrape(Request $request, Tracker $tracker) {
        $this->saveResult($tracker->scrape(), $tracker);
        return redirect($request->get('return') ?? '/seo-monitor')->with('success', "Successfully updated keyword.");
    }
}
