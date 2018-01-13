<?php

namespace App\Http\Controllers;

use App\BlacklistLocation;
use App\BlacklistVehicle;
use App\LocationEntry;
use App\Vehicle;
use Illuminate\Http\Request;

class EntryController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function attempt(){
		return view('layouts.entry.attempt');
	}

	public function identify(Request $request){
		$request->validate([
			'vehicle_id' => 'required'
		]);

		$vehicle_number = $request->get('vehicle_id');

		// check whether it is in database
		$vehicle = Vehicle::where('vehicle_number', $vehicle_number)->first();

		if ($vehicle){
			// its registered
			return redirect()->route('entry.create.vehicle', ['vehicle' => $vehicle]);
		}

		// its unauthorized
		$blacklisted = BlacklistVehicle::where('vehicle_number', $vehicle_number)->first();

		if (!$blacklisted){
			$blacklisted = new BlacklistVehicle;
			$blacklisted->vehicle_number = $request->get('vehicle_id');
			$blacklisted->user()->associate(auth()->user());
			$blacklisted->save();
		}

		$blacklisted->user()->get();

		return redirect()->route('entry.create.blacklisted.vehicle', [ 'blacklisted' => $blacklisted]);
	}

	public function createVehicleEntry(Vehicle $vehicle){
		return view('layouts.entry.create')->with(compact('vehicle'));
	}

	public function createBlacklistedVehicleEntry(BlacklistVehicle $blacklistVehicle){
		return view('layouts.entry.create')->with(compact('blacklistVehicle'));
	}

	public function addVehicleEntry(Request $request, Vehicle $vehicle){
		$request->validate([
			'lat' => 'required',
			'lng' => 'required',
			'note' => 'required|min:5|max:300',
			'location' => 'required',
		]);

		$entry = new LocationEntry;
		$entry->lat = $request->get('lat');
		$entry->lng = $request->get('lng');
		$entry->note = $request->get('note');
		$entry->location = $request->get('location');
		$entry->vehicle()->associate($vehicle);
		$entry->user()->associate(auth()->user());
		$entry->save();

		return redirect()->route('entry.attempt')->with('message' , 'Entry added successfully');
	}

	public function addBlacklistedVehicleEntry(Request $request, BlacklistVehicle $blacklistVehicle){
		$request->validate([
			'lat' => 'required',
			'lng' => 'required',
			'note' => 'required|min:5|max:300',
			'location' => 'required',
		]);

		$entry = new BlacklistLocation;
		$entry->lat = $request->get('lat');
		$entry->lng = $request->get('lng');
		$entry->note = $request->get('note');
		$entry->location = $request->get('location');
		$entry->blacklist_vehicle()->associate($blacklistVehicle);
		$entry->user()->associate(auth()->user());
		$entry->save();

		return redirect()->route('entry.attempt')->with('message' , 'Entry added successfully');
	}
}
