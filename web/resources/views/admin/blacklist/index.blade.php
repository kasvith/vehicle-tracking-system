@extends('admin.master')

@section('page-title', 'Blacklist')

@section('optional-title', 'manage all blacklisted vehicles')

@section('content')
    @include('admin.partials.callouts')

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Add Entry</a>
        </div>
    </div>

    <div class="row ">
        <div class="col-xs-12" style="padding-top: 10px;">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Blacklist</h3>

                    <div class="box-tools">
                        <form action="#" method="get">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" id="search" name="q" class="form-control pull-right autocomplete" autocomplete="false" placeholder="Search...">
                                <div class="input-group-btn">
                                    <span class="btn btn-default"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive ">
                    <table class="table table-hover">
                        <tr>
                            <th>Vehicle No</th>
                            <th class="pull-right">Actions</th>
                        </tr>

                        @foreach($blacklistVehicles as $blacklistVehicle)
                            <tr>
                                <td><a href="/admin/blacklist/{{ $blacklistVehicle->id }}">{{ $blacklistVehicle->vehicle_number }}</a></td>
                                <td class="pull-right">
                                    <a href="#" class="btn btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                    <a href="#"><span class="btn btn-sm btn-flat"><i class="fa fa-trash"></i></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="box-footer clearfix">
                        {{ $blacklistVehicles->links('vendor.pagination.adminlte') }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection