<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = [
		'name',
		'email'
	];

    public function businesses() {
    	return $this->belongsToMany('App\Business');
    }

    public function locations() {
    	return $this->belongsToMany('App\Location');
    }

    // TODO: reviews & reviewRequests
}
