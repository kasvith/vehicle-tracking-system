@extends('admin.master')

@section('page-title', 'User')

@section('optional-title', 'manage all users')

@section('content')
    @include('admin.partials.callouts')

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add User</a>
        </div>
    </div>

    <div class="row ">
        <div class="col-xs-12" style="padding-top: 10px;">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>

                    <div class="box-tools">
                        <form action="{{ route('admin.users.search.ajax') }}" method="get">
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
                                <th>Name</th>
                                <th>NIC</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>

                                    <td><span class="info"><i class="fa fa-1x fa-circle text-{{ $user->isOnline() ? 'success' : 'danger' }}" aria-hidden="true"></i></span> <a href="{{ route('admin.users.show', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->nic }}</td>
                                    <td>
                                        <span class="label label-{{ $user->type == 'admin'? 'success' : 'info'}}">{{ strtoupper($user->type) }}</span>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="label label-{{ $user->gender == 'male'? 'danger' : 'warning'}}">{{ strtoupper($user->gender[0]) }}</span>
                                    </td>
                                    <td>{{ $user->address }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:if(confirm('Do you really want to delete this user ?')){document.getElementById('uuid{!! $user->id !!}').submit();}"><span class="btn btn-sm btn-flat"><i class="fa fa-trash"></i></span></a>
                                        <form id="uuid{{ $user->id }}" action="{{ route('admin.users.delete', ['user' => $user->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                    </table>

                    <div class="box-footer clearfix">
                        {{ $users->links('vendor.pagination.adminlte') }}
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