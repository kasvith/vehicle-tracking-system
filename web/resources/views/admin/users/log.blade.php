@extends('admin.master')

@section('page-title', 'Activity Log')

@section('optional-title', 'view activities of an user')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <a href="{{ route('admin.users.show', ['user' => $user->id]) }}"><i class="fa fa-backward"></i> Back to user</a>
        </div>
    </div>

    <div class="row ">
        <div class="col-xs-12" style="padding-top: 10px;">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>{{ ucfirst($user->name) }}</b>'s activity log</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive ">
                    <table class="table table-hover">
                        <tr>
                            <th>Activity</th>
                            <th>Time</th>
                        </tr>
                        @foreach($user->allLogs as $log)
                            <tr>
                                <td>{!! $log->log !!}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection