<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class SuccessfulLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    private $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
	    $user = $event->user;
	    $user->last_login = Carbon::now();
	    $user->last_login_ip = $this->request->ip();
	    $user->save();
    }
}
