<?php

namespace App;

use \ppajer\SearchResults;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
	protected $fillable = [];

	public function get() {

		$keyword = $this->keyword()->first();
		$serps = new SearchResults([
            'query' => $keyword->text, 
            'location' => $keyword->location, 
            'limit' => 5
        ]);

		return $serps->get();
	}

	public function updateLastPosition(\App\SERP $serp) {
		if ($serp->domain === $this->website()->first()->root_url) {
			# code...
		}
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