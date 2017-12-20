<?php

namespace App\Http\Controllers;

use App\Owner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
	public function __construct() {
		$this->middleware('admin');
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$owners = Owner::orderBy('created_at', 'desc')->paginate(30);
	    $owners->withPath('owners');
        return view('admin.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owners.create');
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
        	'nic' => 'required|min:10|max:20|unique:owners',
	        'first_name' => 'required|min:5',
	        'last_name' => 'required|min:5',
	        'date_of_birth' => 'required|date',
	        'gender' => 'required|in:male,female',
			'title' => 'required|in:mr,mrs,miss,rev',
	        'address' => 'required|min:8|max:100',
	        'province' => 'required|min:4',
	        'district' => 'required|min:4'
        ]);

        $carbon = new Carbon($request->get('date_of_birth'));
        $request['date_of_birth'] = $carbon->toDateString();
        $owner = Owner::create($request->all());

	    log_entry(auth()->user() , 'Owner <b>' . $owner->first_name . ' ' . $owner->last_name .'</b> was created');

		return redirect()->route('admin.owners')->with(
			callout('Owner created', 'success', 'A new owner created')
		);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('admin.owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('admin.owners.edit', compact('owner'));
    }

	public function searchAJAX(Request $request) {
		$search = $request->get('q', '');

		$owners = \DB::table('owners')
		            ->select('id', 'first_name','last_name', 'nic', 'district', 'province')
		            ->where('nic', 'LIKE' , '%'.$search.'%')
		            ->orWhere('first_name', 'LIKE', '%'.$search.'%')
		            ->orWhere('last_name', 'LIKE', '%'.$search.'%')
		            ->orderBy('nic', 'desc')
		            ->limit(5)
		            ->get();

		return $owners;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
	    $request->validate([
		    'nic' => 'required|min:10|max:20|unique:owners,nic,'. $owner->id,
		    'first_name' => 'required|min:5',
		    'last_name' => 'required|min:5',
		    'date_of_birth' => 'required|date',
		    'gender' => 'required|in:male,female',
		    'title' => 'required|in:mr,mrs,miss,rev',
		    'address' => 'required|min:8|max:100',
		    'province' => 'required|min:4',
		    'district' => 'required|min:4'
	    ]);

	    $carbon = new Carbon($request->get('date_of_birth'));
	    $request['date_of_birth'] = $carbon->toDateString();
	    $owner->fill($request->all());
	    $owner->save();

	    log_entry(auth()->user() , 'Owner <b>' . $owner->first_name . ' ' . $owner->last_name .'</b> was updated');

	    return redirect()->route('admin.owners')->with(
		    callout('Owner updated', 'success', 'Owner '. $owner->first_name . ' ' . $owner->last_name . ' was updated')
	    );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
	    $success = $owner->delete();
	    $callout_type = 'success';
	    $callout = 'Owner <b>'. $owner->first_name . "</b> removed successfully";
	    $callout_title = 'Owner removed';

	    if (!$success){
		    $callout_type = 'danger';
		    $callout = 'Owner removing failed due to unknown error';
		    $callout_title = 'Failed removing owner';
	    }

	    log_entry(auth()->user() , 'Owner <b>' . $owner->first_name . '</b> was removed');

	    return redirect()->route('admin.owners')->with(
		    callout($callout_title, $callout_type, $callout)
	    );
    }
}
