@extends('admin.master')

@section('page-title', 'Blacklisted Vehicle Information')

@section('optional-title', 'view details about a suspicious vehicle')

@section('content')
    <div class="row">
        <div class="col-md-12" style="padding-top: 10px">
            <div class="box box-danger" >
                <div class="box-header with-border">
                    <h3 class="box-title">Entries for <b>{{ $blacklistVehicle->vehicle_number }}</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" id="app">
                    <google-maps name="locations" locs="{{ $blacklistVehicle->blacklist_locations }}"></google-maps>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('user-scripts')
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=loadMap"></script>

    <script>
        function loadMap(){
            window.app.initMaps()
        }
    </script>
@endsection

