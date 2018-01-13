@extends('admin.master')

@section('page-title', 'Owner Profile')

@section('optional-title', 'view details about owner')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.owners.edit', ['owner' => $owner->id]) }}"><span class="label label-primary"><i class="fa fa-edit"></i> edit</span></a>
                        <a href="{{ route('admin.vehicles.create', ['owner' => $owner->id]) }}"><span class="label label-primary"><i class="fa fa-plus"></i> add vehicle</span></a>
                        <a href="javascript:if(confirm('Do you really want to delete this owner ?')){document.getElementById('uuid{!! $owner->id !!}').submit();}"><span class="label label-primary"><i class="fa fa-trash"></i> delete</span></a>
                        <form id="uuid{{ $owner->id }}" action="{{ route('admin.owners.delete', ['owner' => $owner->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                        </form>
                    </div>

                </div>
                <!-- /.box-tools -->

                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ $owner->gender == 'male' ? '/_admin/img/avatar.png' : '/_admin/img/avatar2.png' }}" alt="Owner profile picture">

                    <p class="text-muted text-center"><span class="label label-danger">OWNER</span></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>NIC</b> <a class="pull-right">{{ $owner->nic }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Title</b> <a class="pull-right">{{ $owner->title }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>First Name</b> <a class="pull-right">{{ ucfirst($owner->first_name) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Last Name</b> <a class="pull-right">{{ ucfirst($owner->last_name) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Gender</b> <a class="pull-right">{{ ucfirst($owner->gender) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Date of Birth</b> <a class="pull-right">{{ ucfirst($owner->date_of_birth) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>District</b> <a class="pull-right">{{ $owner->district }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Province</b> <a class="pull-right">{{ $owner->province }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Address</b> <a class="pull-right" title="{{ ucfirst($owner->address) }}">{{ mb_strimwidth(ucfirst($owner->address), 0, 50, '...') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
        <div class="col-md-7" style="padding-top: 10px">
            <div class="box box-danger" >
                <div class="box-header with-border">
                    <h3 class="box-title">Registered Vehicles</h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        @if(count($owner->vehicles) > 0)
                            @foreach($owner->vehicles as $vehicle)
                                <li class="list-group-item"><a href="/admin/vehicles/{{ $vehicle->id }}">{{ $vehicle->vehicle_number }}</a></li>
                            @endforeach
                        @else
                            <li class="list-group-item">No registered vehicles</li>
                        @endif
                    </ul>
                </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

