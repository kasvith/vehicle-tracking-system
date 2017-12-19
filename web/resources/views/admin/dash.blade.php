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
    </div>
@endsection