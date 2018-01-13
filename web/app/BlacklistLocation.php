<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlacklistLocation extends Model
{
	protected $fillable = [
		'lat', 'lng', 'note', 'location'
	];

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function blacklist_vehicle(){
		return $this->belongsTo(BlacklistVehicle::class);
	}
}
