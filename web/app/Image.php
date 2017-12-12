<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [
		'image'
	];

    public function vehicle(){
    	return $this->belongsTo(Vehicle::class);
    }
}
