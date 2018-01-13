@extends('admin.master')

@section('page-title', 'Add New Vehicle')
@section('optional-title', 'add a new vehicle to the system')

@section('header-content')
    <link rel="stylesheet" href="/css/dropzone.css" />
    <link rel="stylesheet" href="/_admin/bower_components/colorpicker/css/colorpicker.css">
    <style>
        .dropzone{
            border: 5px dotted #3e81bb;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            margin: 20px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border ">
                    <h3 class="box-title">Fill the form for add new vehicle to the system </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="data-form" method="post" action="{{ route('admin.vehicles.store') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('owner_id') ? 'has-error' :'' }}">
                            <label for="vehicleNumber">Owner NIC</label>
                            <input type="text" class="form-control" id="ownerID" required placeholder="Enter Owner ID" value="{{ session()->get('owner_id') ? session()->get('owner_id') : old('owner_id') }}" name="owner_id">
                            @if($errors->has('owner_id'))<span class="help-block">{{ $errors->first('owner_id') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('vehicle_number') ? 'has-error' :'' }}">
                            <label for="vehicleNumber">Vehicle Number:</label>
                            <input type="text" class="form-control" id="vehicleNumber" required placeholder="Enter Vehicle Number" value="{{ old('vehicle_number') }}" name="vehicle_number">
                            @if($errors->has('vehicle_number'))<span class="help-block">{{ $errors->first('vehicle_number') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('color') ? 'has-error' :'' }}">
                            <label for="vehicleColor">Color:</label>
                            <input type="text" class="form-control color-picker" required id="vehicleColor" value="{{ old('color') }}" placeholder="Color" name="color">
                            @if($errors->has('color'))<span class="help-block">{{ $errors->first('color') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('engine_number') ? 'has-error' :'' }}">
                            <label for="engineNumber">Engine Number:</label>
                            <input type="text" class="form-control" id="engineNumber" required placeholder="Enter Engine Number" value="{{ old('engine_number') }}" name="engine_number">
                            @if($errors->has('engine_number'))<span class="help-block">{{ $errors->first('engine_number') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('chassi_number') ? 'has-error' :'' }}">
                            <label for="chassiNumber">Chassi Number:</label>
                            <input type="text" class="form-control" id="chassiNumber" placeholder="Enter Chassi Number" value="{{ old('chassi_number') }}" name="chassi_number">
                            @if($errors->has('chassi_number'))<span class="help-block">{{ $errors->first('chassi_number') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('engine_capacity') ? 'has-error' :'' }}">
                            <label for="engineCapacity">Engine Capacity:</label>
                            <input type="text" class="form-control" id="engineCapacity" required placeholder="Enter Engine Capacity" value="{{ old('engine_capacity') }}" name="engine_capacity">
                            @if($errors->has('engine_capacity'))<span class="help-block">{{ $errors->first('engine_capacity') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
                            <label for="type">Type :</label>
                            <input type="text" class="form-control " id="type" required placeholder="Enter Vehicle Type" value="{{ old('type') }}" name="type">
                            @if($errors->has('type'))<span class="help-block">{{ $errors->first('type') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('images') ? 'has-error' :'' }}">
                            <label for="uploads">Images : </label>
                            <div id="uploads" class="dropzone"></div>
                            @if($errors->has('images'))<span class="help-block">{{ $errors->first('images') }}</span>@endif
                        </div>
                        <span id="images"></span>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add New Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('user-scripts')
    <script src="/js/dropzone.js"></script>
    <script src="/_admin/bower_components/colorpicker/js/colorpicker.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        function showNotification(title, message, type) {
            $.notify({
                title: title,
                message: message,
            },{
                type: type,
                delay: 5000,
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 callout callout-{0}">' +
                    '<h3 data-notify="title">{1}</h3>' +
                    '<span data-notify="message">{2}</span>' +
                '</div>'
            });
        }

        $(document).ready(function () {
            $('.color-picker').ColorPicker({
                onBeforeShow: function () {
                    $(this).ColorPickerSetColor(this.value);
                },
                onChange: function (hsb, hex, rgb) {
                    $('#vehicleColor').val("#" +hex)
                }
            });

            $("#uploads").dropzone({
                url: '/admin/vehicles/ajax/images',
                addRemoveLinks: true,
                paramName: 'image',
                maxFiles: 5,
                acceptedFiles: "image/*",
                dictDefaultMessage: "Upload images of vehicle",
                dictCancelUploadConfirmation: "Are you sure that you want to cancel upload ?",
                dictCancelUpload: "Cancel Upload",
                dictRemoveFile: "Remove",
                dictRemoveFileConfirmation: "Are you sure that you want to delete this file ?",
                params:{
                    _token: "{{ csrf_token() }}"
                },
                success: function (file, res) {
                    var imgName = res.name;
                    file.previewElement.classList.add("dz-success");
                    file.uuid = imgName;
                    $("#images").append('<input type="hidden" name="images[]" value="' + imgName + '" />');
                },
                error: function (file, res) {
                    if (file.uuid)
                        $("input[value='"+file.uuid+"']").remove();

                    $(document).find(file.previewElement).remove();
                    showNotification('Error', res, 'danger');
                },
                removedfile: function (file) {
                    if (file.uuid){
                        $("input[value='"+file.uuid+"']").remove();

                        $.ajax({
                            url: '/admin/vehicles/ajax/images/delete/' + file.uuid,
                            dataType: "JSON",
                            type: 'DELETE',
                            data: {_token :"{{ csrf_token() }}"},
                            success: function (res) {
                                showNotification('Information', res.message, 'info');
                                $(document).find(file.previewElement).remove();
                            },
                            error: function (res) {
                                showNotification('Error occurred', res.message, 'danger');
                                $(document).find(file.previewElement).remove();
                            }
                        });
                    }else {
                        $(document).find(file.previewElement).remove();
                    }
                },
                maxfilesexceeded: function (file) {
                    this.removeFile(file);
                }
            });
        })
    </script>
@endsection
