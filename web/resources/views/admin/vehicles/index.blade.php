@extends('admin.master')

@section('page-title', 'Owners')

@section('optional-title', 'manage all owners')

@section('content')
    @include('admin.partials.callouts')

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('admin.vehicles.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Vehicle</a>
        </div>
    </div>

    <div class="row ">
        <div class="col-xs-12" style="padding-top: 10px;">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Vehicles</h3>

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
                            <th>Color</th>
                            <th>Type</th>
                            <th>Owner</th>
                            <th>Actions</th>
                        </tr>

                        @foreach($vehicles as $vehicle)
                            <tr>
                                <td><a href="/admin/vehicles/{{ $vehicle->id }}">{{ $vehicle->vehicle_number }}</a></td>
                                <td><span class="color-box" style="background-color: {{ $vehicle->color }}"></td>
                                <td>{{ $vehicle->type }}</td>
                                <td>{{ $vehicle->owner->first_name . ' ' . $vehicle->owner->last_name }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:if(confirm('Do you really want to delete this vehicle ?')){document.getElementById('uuid{!! $vehicle->id !!}').submit();}"><span class="btn btn-sm btn-flat"><i class="fa fa-trash"></i></span></a>
                                    <form id="uuid{{ $vehicle->id }}" action="{{ route('admin.vehicles.delete', ['vehicle' => $vehicle->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="box-footer clearfix">
                        {{ $vehicles->links('vendor.pagination.adminlte') }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('user-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#search").autocomplete({
                minLength: 2,
                source: function( request, response ) {
                    $.ajax({
                        url: '/admin/vehicles/ajax/search',
                        dataType: "json",
                        data: { q: request.term},
                        success: function( data ) {
                            response( $.map( data, function( item ) {
                                return {
                                    firstName: item.first_name,
                                    lastName: item.last_name,
                                    id: item.id,
                                    nic: item.nic,
                                    district: item.district,
                                    province: item.province
                                }
                            }));
                        }
                    });
                },
                focus: function( event, ui ) {
                    return false;
                },
                select: function( event, ui ) {
                    window.location.href = location.protocol + '//' + location.host + '/admin/vehicles/' + ui.item.id;
                }
            }).data( "ui-autocomplete" )._renderItem = function(ul, item) {
                var inner_html = '<a href="' + location.protocol + '//' + location.host + '/admin/vehicles/' + item.id + '" class="text-black">' +
                    '<div class="row"><div class="details"><b>'+ item.firstName + ' ' + item.lastName+ '</b><br><i>'+ item.nic +'</i><br>' +
                    '<i>' + item.district + ' ' + item.province + '</i></div></div></a>';
                return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append(inner_html)
                    .appendTo( ul );
            };
        });
    </script>
@endsection