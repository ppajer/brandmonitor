<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
	protected $fillable = [
		'name'
	];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function locations() {
    	return $this->hasMany('App\Location');
    }

    public function customers() {
    	return $this->hasMany('App\Customer');
    }

    public function websites() {
    	return $this->hasMany('App\Website');
    }
}
