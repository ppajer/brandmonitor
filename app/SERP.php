<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SERP extends Model
{
	protected $fillable = [
		'title',
		'description',
		'url',
		'position',
		'location'
	];

	public function keyword() {
    	return $this->belongsTo('App\Keyword');
    }
}
