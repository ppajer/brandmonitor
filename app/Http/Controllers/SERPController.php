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

    /**
     * Attempt to find existing SERP for given
     * tracker and result combination.
     *
     * @return App\SERP
     */
    public static function findFromScrapeResult($serp, $tracker) {
        return $tracker->keyword()
                        ->first()
                        ->SERPs()
                        ->where([
                            'title' => $serp['title'],
                            'description' => $serp['description'],
                            'url' => $serp['link'],
                            'domain' => $domain,
                            'position' => $serp['position']
                        ])
                        ->get();
    }

    /**
     * Create new SERP from scraper data
     *
     * @return App\SERP
     */
    public static function createFromScrapeResult($serp, $tracker) {
        
        if (!isset($serp['link'])) {
            return false;
        }

        $parts = explode('://', $serp['link']);
        $url = explode('/', $parts[1]);
        $domain = $url[0];

        $model = SERP::create([
                'title' => $serp['title'],
                'description' => $serp['description'],
                'url' => $serp['link'],
                'domain' => $domain,
                'position' => $serp['position']
            ]);

        $model->keyword()->associate($tracker->keyword()->first());
        $model->save();
        return $model;
    }
}
