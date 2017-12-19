@extends('admin.master')

@section('page-title', 'Preferences')

@section('optional-title', 'change your preferences')

@section('content')
    @include('admin.partials.callouts')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General</h3>
                </div>
                <div class="box-body box-profile">
                    <form action="{{ route('admin.users.settings.save') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name" value="{{ old('name') ? old('name') : $user->name }}" name="name" required>
                            @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                            <label for="exampleInputName">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter e-mail" value="{{ $user->email }}" name="email">
                            @if($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
                            <label for="exampleInputName">Address</label>
                            <input type="text" class="form-control " id="exampleInputAddress" placeholder="Enter address" value="{{ $user->address }}" name="address">
                            @if($errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label for="exampleInputFile">User Image</label>
                            <br>
                            <img src="{{ asset($user->image) }}" id="image_upload_preview" class="image_upload_preview">

                            <label>
                                <input type="checkbox" class="minimal" name="remove_image"> Remove image
                            </label>

                            <input type="file"  id="inputFile" name="image">
                            @if($errors->has('image'))<span class="help-block">{{ $errors->first('image') }}</span>@endif
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-info">Reset</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-solid box-danger" >
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <form action="{{ route('admin.users.settings.password.update') }}" id="changepassword" method="post">
                    {{ csrf_field() }}
                    <div class="box-body box-profile">
                        <div class="form-group {{ $errors->has('current_password') ? 'has-error' :'' }}">
                            <label for="exampleInputPassword1">Current Password</label>
                            <input type="password" name="current_password" class="form-control" id="exampleInputPassword1" placeholder="Enter current password" required="true">
                            @if($errors->has('current_password'))<span class="help-block">{{ $errors->first('current_password') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required>
                            @if($errors->has('password'))<span class="help-block">{{ $errors->first('password') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' :'' }}">
                            <label for="password_confirmation">Retype Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Retype new password" required>
                            @if($errors->has('password_confirmation'))<span class="help-block">{{ $errors->first('password_confirmation') }}</span>@endif
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger" onClick="validatePassword();">Change My Password</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>

    </div>
@endsection

@section('user-scripts')
    <script src="/_admin/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2();

            $('.has-error').click(function () {
                $(this).removeClass('has-error');
                $(this).children('.help-block').remove();
            });

            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            });
        })

        function validatePassword() {
            var validator = $("#changepassword").validate({
                rules: {
                    password: "required",
                    password_confirmation: {
                        equalTo: "#password"
                    }
                },
                messages: {
                    password: " Enter a password",
                    password_confirmation: "Correctly retype your new password"
                },
                highlight: function(element) {
                    jQuery(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    jQuery(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if(element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        //}
    </script>

    @include('admin.partials.scripts.file-upload-preview')
@endsection