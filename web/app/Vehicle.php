<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	protected $fillable = [
		'vehicle_number', 'color', 'engine_number', 'chassi_number', 'engine_capacity', 'type'
	];

	public function owner(){
	    return $this->belongsTo(Owner::class);
    }

    public function images(){
    	return $this->hasMany(Image::class);
    }

    public function location_entries(){
    	return $this->hasMany(LocationEntry::class);
    }
}
