@extends('layouts.master')

@section('title', 'Add an Entry')

@section('content')
    <div id="app" class="container pt-5">
        <div id="accordion" class="pt-5" role="tablist">
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="true" aria-controls="collapseTwo">
                            Add Entry
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        @if(isset($vehicle))
                            <google-maps name="entry" add-entry-endpoint="{{ route('entry.create.vehicle.post', ['vehicle' => $vehicle->id]) }}" token="{{ csrf_token() }}"></google-maps>
                        @elseif(isset($blacklistVehicle))
                            <google-maps name="entry" add-entry-endpoint="{{ route('entry.create.blacklisted.vehicle.post', ['blacklistVehicle' => $blacklistVehicle->id]) }}" token="{{ csrf_token() }}"></google-maps>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseOne">
                            Past Incidents
                        </a>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        @if(isset($vehicle))
                            @if(count($vehicle->location_entries) > 0)
                                <google-maps name="locs" locs="{{ $vehicle->location_entries }}" ></google-maps>
                            @else
                                No past incidents found !
                            @endif
                        @elseif(isset($blacklistVehicle))
                            @if(count($blacklistVehicle->blacklist_locations) > 0)
                                <google-maps name="locs" locs="{{  $blacklistVehicle->blacklist_locations }}"></google-maps>
                            @else
                                No past incidents found !
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @if(isset($vehicle))
            <div class="card">
                <div class="card-header" role="tab" id="headingThree">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
                            Vehicle Details
                        </a>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <h5>Owner Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><b>Owner's NIC</b> : {{ $vehicle->owner->nic }}</li>
                            <li class="list-group-item"><b>Owner's Name</b> : {{ $vehicle->owner->first_name . ' ' . $vehicle->owner->last_name }}</li>
                        </ul>

                        <h5 class="pt-2">Vehicle Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><b>Vehicle Number</b> : {{ $vehicle->vehicle_number }}</li>
                            <li class="list-group-item"><b>Engine Number</b> : {{ $vehicle->engine_number }}</li>
                            <li class="list-group-item"><b>Chassi Number</b> : {{ $vehicle->chassi_number }}</li>
                            <li class="list-group-item"><b>Engine Capacity</b> : {{ $vehicle->chassi_number }}</li>
                            <li class="list-group-item"><b>Type</b> : {{ $vehicle->type }}</li>
                            <li class="list-group-item"><b>Date Registered</b> : {{ $vehicle->created_at }}</li>
                            <li class="list-group-item"><b>Color</b> <span class="color-box" style="background-color: {{ $vehicle->color }}"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
@endsection