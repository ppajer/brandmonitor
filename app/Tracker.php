<?php

namespace App;

// wtf is psr4
require '../vendor/ppajer/searchresults/lib/HTML5DOMDocument/Internal/QuerySelectors.php';
require '../vendor/ppajer/searchresults/lib/HTML5DOMDocument.php';
require '../vendor/ppajer/searchresults/lib/HTML5DOMElement.php';
require '../vendor/ppajer/searchresults/lib/HTML5DOMNodeList.php';
require '../vendor/ppajer/searchresults/lib/HTML5DOMTokenList.php';
require '../vendor/ppajer/searchresults/lib/class.DOM_Extractor.php';
require '../vendor/ppajer/searchresults/lib/class.Request.php';
require '../vendor/ppajer/searchresults/lib/class.ParallelRequest.php';
require '../vendor/ppajer/searchresults/lib/WebScraper.php';
require '../vendor/ppajer/searchresults/lib/SearchResults.php';
use ppajer\SearchResults;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
	protected $fillable = [
		'location'
	];

	public function currentPosition(\App\Keyword $keyword) {
		return $keyword->SERPs()->latest()->position ?? 'N/A';
	}

	public function scraperOpts() {
		return [
            'query' => $this->keyword()->first()->text, 
            'location' => $this->location, 
            'limit' => 5
        ];
	}

	public function scrape() {
		$serps = new SearchResults($this->scraperOpts());var_dump($serps->get());
		return $serps->get();
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

    public function website() {
    	return $this->belongsTo('App\Website');
    }

    public function keyword() {
    	return $this->belongsTo('App\Keyword');
    }
}
