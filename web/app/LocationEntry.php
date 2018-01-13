<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationEntry extends Model
{
	protected $fillable = [
		'lat', 'lng', 'note', 'location'
	];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function vehicle(){
    	return $this->belongsTo(Vehicle::class);
    }
}
