<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'last_login', 'image', 'nic', 'address', 'last_login', 'last_login_ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function isOnline()
	{
		return cache()->has('user-is-online-' . $this->id);
	}

	public function locationEntries(){
		return $this->hasMany(LocationEntry::class);
	}

	public function logs($limit = 30){
		return $this->hasMany(UserActivityLog::class)->orderBy('created_at', 'desc')->limit($limit);
	}

	public function allLogs(){
		return $this->hasMany(UserActivityLog::class)->orderBy('created_at', 'desc');
	}
}
