<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
	protected $fillable = [
		'text',
		'location'
	];

    public function SERPs() {
    	return $this->hasMany('App\SERP');
    }

    public function trackers() {
    	return $this->hasMany('App\Tracker');
    }
}
