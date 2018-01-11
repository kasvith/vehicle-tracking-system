<?php

namespace App\Http\Controllers;

use App\Image;
use App\Owner;
use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$vehicles = Vehicle::orderBy('created_at', 'desc')->paginate(30);
    	$vehicles->withPath('vehicles');
        return view('admin.vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\request('owner') && \request('owner') != null){
            $owner = Owner::find(\request('owner'));
            session()->flash('owner_id', $owner->nic);
        }

        return view('admin.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,nic',
            'vehicle_number' => 'required|min:5|unique:vehicles,vehicle_number',
            'color' => 'required|min:7',
            'engine_number' => 'required|min:5',
            'chassi_number' => 'required|min:5',
            'engine_capacity' => 'required|integer',
            'type' => 'required|min:2',
            'images' => 'present|array'
        ]);

        $owner = Owner::where('nic', $request->get('owner_id'))->first();
        $vehicle = new Vehicle;
        $vehicle->vehicle_number = $request->get('vehicle_number');
        $vehicle->color = $request->get('color');
        $vehicle->engine_number = $request->get('engine_number');
        $vehicle->engine_capacity = $request->get('engine_capacity');
        $vehicle->chassi_number = $request->get('chassi_number');
        $vehicle->type = $request->get('type');
        $vehicle->owner()->associate($owner);
        $vehicle->save();

        $images = [];
        foreach ($request->get('images') as $image){
            $entry = new Image;
            $entry->image = '/storage/_vehicles/' . $image;
            $entry->vehicle()->associate($vehicle);
            $entry->save();
        }


        log_entry(auth()->user() , "Vehicle added for <b>" . $owner->name . "</b>");

        return redirect()->to('/admin/vehicles')->with(
            callout('Information', 'success', 'Vehicle added')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
