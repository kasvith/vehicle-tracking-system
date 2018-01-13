@extends('admin.master')

@section('page-title', 'Vehicle Information')

@section('optional-title', 'view details about a vehicle')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.owners.edit', ['vehicle' => $vehicle->id]) }}"><span class="label label-primary"><i class="fa fa-edit"></i> edit</span></a>
                        <a href="javascript:if(confirm('Do you really want to delete this vehicle ?')){document.getElementById('uuid{!! $vehicle->id !!}').submit();}"><span class="label label-primary"><i class="fa fa-trash"></i> delete</span></a>
                        <form id="uuid{{ $vehicle->id }}" action="{{ route('admin.owners.delete', ['vehicle' => $vehicle->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                        </form>
                    </div>

                </div>
                <!-- /.box-tools -->
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Vehicle No</b> <a class="pull-right">{{ $vehicle->vehicle_number }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Color</b> <a class="pull-right"><span class="color-box" style="background-color: {{ $vehicle->color }}"></span></a>
                        </li>
                        <li class="list-group-item">
                            <b>Engine Number</b> <a class="pull-right">{{ $vehicle->engine_number }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Chassi Number</b> <a class="pull-right">{{ $vehicle->chassi_number }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Engine Capacity</b> <a class="pull-right">{{ $vehicle->chassi_number }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Type</b> <a class="pull-right">{{ $vehicle->type }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Date Registered</b> <a class="pull-right">{{ $vehicle->created_at }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Owner</b> <a class="pull-right" href="/admin/owners/{{ $vehicle->owner->id }}">{{ $vehicle->owner->nic }}</a>
                        </li>
                    </ul>
                    <div class="image-gallery">
                        <b>Images :</b><br>
                        @foreach($vehicle->images as $image)
                            <img src="{{ $image->image }}" data-toggle="modal" data-target="#myModal">
                        @endforeach
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        View Image
                    </div>
                    <div class="modal-body text-center">
                        <img id="showImage" class="img-responsive" src="" style="border: 1px solid #0a0a0a">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /.box -->
        <div class="col-md-7" style="padding-top: 10px">
            <div class="box box-danger" >
                <div class="box-header with-border">
                    <h3 class="box-title">Entries</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" id="app">
                    <google-maps name="locations" locs="{{ $vehicle->location_entries }}"></google-maps>
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
        $(document).ready(function () {
            $('.image-gallery img').on('click', function () {
                var image = $(this).attr('src');
                $('#myModal').on('show.bs.modal', function () {
                    $("#showImage").attr("src", image);
                });
            });
        });

        function loadMap(){
            window.app.initMaps()
        }
    </script>
@endsection

