<?php

function callout( $title, $type, $content){
	return [
		'callout' => $content,
		'callout-type' => $type,
		'callout-title' => $title,
	];
}

/**
 * Record a log entry
 *
 * @param $user
 * @param $message
 */
function log_entry($user, $message){
	$log = new \App\UserActivityLog();
	$log->log = $message;
	$log->user()->associate($user);
	$log->save();
}