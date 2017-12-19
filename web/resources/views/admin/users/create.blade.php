@extends('admin.master')

@section('page-title', 'Add new user')
@section('optional-title', 'You can add a new user to the system')
@section('header-content')
    @include('admin.partials.styles.file-upload-preview')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">enter information</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form role="form" method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>User Type</label>
                            <select name="type" class="form-control select2" style="width: 100%;">
                                <option value="admin">Admin</option>
                                <option value="officer">Officer</option>
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('nic') ? 'has-error' :'' }}">
                            <label for="exampleInputNIC">NIC Number</label>
                            <input type="text"  class="form-control" id="exampleInputNICnumber" value="{{ old('nic') }}" placeholder="NIC Number" name="nic" required>
                            @if($errors->has('nic'))<span class="help-block">{{ $errors->first('nic') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name" value="{{ old('name') }}" name="name" required>
                            @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                        </div>
                        <div class="form-group">
                            <label>Gender</label>

                            <select name="gender" id="gender" class="form-control select2" style="width: 100%;">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                            <label for="exampleInputName">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter e-mail" value="{{ old('email') }}" name="email">
                            @if($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
                            <label for="exampleInputName">Address</label>
                            <input type="text" class="form-control " id="exampleInputAddress" placeholder="Enter address" value="{{ old('address') }}" name="address">
                            @if($errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label for="exampleInputFile">User Image</label>
                            <img src="/_admin/img/avatar.png" id="image_upload_preview" class="image_upload_preview">
                            <input type="file"  id="inputFile" name="image">
                            @if($errors->has('image'))<span class="help-block">{{ $errors->first('image') }}</span>@endif
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('user-scripts')
    <script>
        $(document).ready(function(){
            $('.has-error').click(function () {
                $(this).removeClass('has-error');
                $(this).children('.help-block').remove();
            });

            $('.select2').select2();

            $('#gender').on('change', function (val) {
                if ($('#inputFile').get(0).files.length === 0) {
                    var src = '/_admin/img/avatar.png';
                    if(this.value === 'female')
                        src = '/_admin/img/avatar2.png';

                    $('#image_upload_preview').attr('src', src);
                }
            });
        })
    </script>

    @include('admin.partials.scripts.file-upload-preview')
@endsection