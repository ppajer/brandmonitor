<?php

namespace App\Http\Controllers;

use App\SERP;
use Illuminate\Http\Request;
use ppajer\SearchResults;

class SERPController extends Controller
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


    public static function createFromScrapeResult($serp, $tracker) {
        $model = new SERP([
                'title' => $serp['title'],
                'description' => $serp['description'],
                'url' => $serp['link'],
                'position' => $serp['position'],
                'location' => $tracker->location
            ]);
        $model->keyword()->associate($tracker->keyword()->first());
        // maybe save here instead of returning? not sure
        return $model;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SERP  $sERP
     * @return \Illuminate\Http\Response
     */
    public function show(SERP $sERP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SERP  $sERP
     * @return \Illuminate\Http\Response
     */
    public function edit(SERP $sERP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SERP  $sERP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SERP $sERP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SERP  $sERP
     * @return \Illuminate\Http\Response
     */
    public function destroy(SERP $sERP)
    {
        //
    }
}
