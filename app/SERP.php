<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SERP extends Model
{
	protected $table = 'serps';

	protected $fillable = [
		'title',
		'description',
		'domain',
		'url',
		'position',
		'location'
	];

	public function keyword() {
    	return $this->belongsTo('App\Keyword');
    }
}
