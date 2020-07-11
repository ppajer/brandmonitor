<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

	protected $fillable = [
		'name',
		'email',
		'phone',
		'street_address',
		'city',
		'country',
		'post_code',
		'listings'
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

    public function business() {
    	return $this->belongsToMany('App\Business');
    }

    public function customers() {
    	return $this->hasMany('App\Customer');
    }

    public function websites() {
    	return $this->hasMany('App\Website');
    }
}
