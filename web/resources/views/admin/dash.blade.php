@extends('admin.master')

@section('page-title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $users }}</h3>

                    <p>Registered users</p>
                </div>
                <div class="icon">
                    <a href="{{ route('admin.users.create') }}" class="link-black"><i class="ion ion-person-add"></i></a>
                </div>
                <a href="{{ route('admin.users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $owners }}</h3>

                    <p>Registered owners</p>
                </div>
                <div class="icon">
                    <a href="{{ route('admin.owners.create') }}" class="link-black"><i class="ion ion-ios-people"></i></a>
                </div>
                <a href="{{ route('admin.owners') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>{{ $vehicles }}</h3>

                    <p>Vehicles</p>
                </div>
                <div class="icon">
                    <a href="{{ route('admin.vehicles.create') }}" class="link-black"><i class="ion ion-ios-plus"></i></a>
                </div>
                <a href="{{ route('admin.vehicles') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $blacklists }}</h3>

                    <p>Blacklisted Vehicles</p>
                </div>
                <div class="icon">
                    <a href="{{ route('admin.owners.create') }}" class="link-black"><i class="ion ion-ios-close"></i></a>
                </div>
                <a href="{{ route('admin.blacklist.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection