<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlacklistVehicle extends Model
{
    protected $fillable = [
    	'vehicle_number',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function blacklist_locations(){
    	return $this->hasMany(BlacklistLocation::class);
    }
}
