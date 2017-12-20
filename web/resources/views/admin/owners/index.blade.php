@extends('admin.master')

@section('page-title', 'Owners')

@section('optional-title', 'manage all owners')

@section('content')
    @include('admin.partials.callouts')

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('admin.owners.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Owner</a>
        </div>
    </div>

    <div class="row ">
        <div class="col-xs-12" style="padding-top: 10px;">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>

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
                            <th>NIC</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>District</th>
                            <th>Province</th>
                            <th>Actions</th>
                        </tr>
                        
                        @foreach($owners as $owner)
                            <tr>
                                <td>{{ $owner->nic }}</td>
                                <td>{{ ucfirst($owner->first_name) }}</td>
                                <td>{{ ucfirst($owner->last_name) }}</td>
                                <td>
                                    <span class="label label-{{ $owner->gender == 'male'? 'danger' : 'warning'}}">{{ strtoupper($owner->gender[0]) }}</span>
                                </td>
                                <td>{{ $owner->district }}</td>
                                <td>{{ $owner->province }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', ['user' => $owner->id]) }}" class="btn btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:if(confirm('Do you really want to delete this owner ?')){document.getElementById('uuid{!! $owner->id !!}').submit();}"><span class="btn btn-sm btn-flat"><i class="fa fa-trash"></i></span></a>
                                    <form id="uuid{{ $owner->id }}" action="{{ route('admin.users.delete', ['user' => $owner->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="box-footer clearfix">
                        {{ $owners->links('vendor.pagination.adminlte') }}
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
                        url: '/admin/users/ajax/search',
                        dataType: "json",
                        data: { q: request.term},
                        success: function( data ) {
                            response( $.map( data, function( item ) {
                                return {
                                    name: item.name,
                                    id: item.id,
                                    nic: item.nic,
                                    email: item.email,
                                }
                            }));
                        }
                    });
                },
                focus: function( event, ui ) {
                    return false;
                },
                select: function( event, ui ) {
                    window.location.href = location.protocol + '//' + location.host + '/admin/users/' + ui.item.id;
                }
            }).data( "ui-autocomplete" )._renderItem = function(ul, item) {
                var inner_html = '<a href="' + location.protocol + '//' + location.host + '/admin/users/' + item.id + '" class="text-black">' +
                    '<div class="row"><div class="details"><b>'+ item.name +'</b><br><i>'+ item.email +'</i><br>' +
                    '<i>' + item.nic + '</i></div></div></a>';
                return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append(inner_html)
                    .appendTo( ul );
            };
        });
    </script>
@endsection