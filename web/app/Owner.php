<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
	protected $fillable = [
		'first_name', 'last_name', 'birth_of_date', 'nic', 'sex' , 'title', 'address', 'district', 'province'
	];

    public function vehicles(){
    	return $this->hasMany(Vehicle::class);
    }
}
