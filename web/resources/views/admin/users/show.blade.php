@extends('admin.master')

@section('page-title', 'User Profile')

@section('optional-title', 'view details about user')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-tools pull-right">
                        <a href="{{ $user->id != auth()->user()->id ? route('admin.users.edit', ['user' => $user->id]) : route('admin.users.settings') }}"><span class="label label-primary"><i class="fa fa-edit"></i> edit</span></a>

                        @if($user->id != auth()->user()->id)
                            <a href="javascript:if(confirm('Do you really want to delete this user ?')){document.getElementById('uuid{!! $user->id !!}').submit();}"><span class="label label-primary"><i class="fa fa-trash"></i> delete</span></a>
                            <form id="uuid{{ $user->id }}" action="{{ route('admin.users.delete', ['user' => $user->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                            </form>
                        @endif
                    </div>
                </div>
                <!-- /.box-tools -->
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset($user->image) }}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-center"><i class="fa fa-sm fa-circle text-{{ $user->isOnline() ? 'success' : 'danger' }}" aria-hidden="true"></i>
                        {{ $user->isOnline() ? 'Online' : 'Offline' }}
                    </p>

                    <p class="text-muted text-center"><span class="label label-{{ $user->type == 'admin'? 'success' : 'info'}}">{{ strtoupper($user->type) }}</span></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>NIC</b> <a class="pull-right">{{ $user->nic }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Gender</b> <a class="pull-right">{{ ucfirst($user->gender) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Address</b> <a class="pull-right" title="{{ ucfirst($user->address) }}">{{ mb_strimwidth(ucfirst($user->address), 0, 50, '...') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Last Login IP</b> <a class="pull-right">{{ $user->last_login_ip }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Last Login</b> <a class="pull-right">{{ \Carbon\Carbon::createFromTimestamp(strtotime($user->last_login))->diffForHumans()  }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-7" style="padding-top: 10px">
            <div class="box box-danger" >
                <div class="box-header with-border">
                    <h3 class="box-title">Activity Log</h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                    @if(count($user->logs) > 0)
                        @foreach($user->logs as $log)
                            <li class="list-group-item">{!! $log->log  !!}  <a class="pull-right">{{ $log->created_at->diffForHumans() }}</a></li>
                        @endforeach
                    @else
                        <li class="list-group-item">No recent activities</li>
                    @endif
                    </ul>
                </div>

                @if(count($user->logs) > 0)
                    <div class="box-footer text-center">
                        <a href="{{ route('admin.users.log', ['user' => $user->id]) }}">Load more...</a>
                    </div>
                @endif
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
@endsection

