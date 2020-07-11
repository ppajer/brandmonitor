<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
	protected $fillable = [
		'name',
		'root_url',
		'protocol'
	];

	public function url() {
		return sprintf('%s://%s', $this->protocol, $this->root_url);
	}

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function business() {
    	return $this->belongsTo('App\Business');
    }

    public function locations() {
    	return $this->belongsToMany('App\Location');
    }

    public function trackers() {
    	return $this->hasMany('App\Tracker');
    }
}
