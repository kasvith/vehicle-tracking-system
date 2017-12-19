@extends('admin.master')

@section('page-title', 'Edit user')

@section('optional-title', 'Edit details of user')

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
                <form role="form" method="post" action="{{ route('admin.users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputUserType">User Type</label>

                            <select name="type" class="form-control select2" style="width: 100%;">
                                <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="officer" {{ $user->type == 'officer' ? 'selected' : '' }}>Officer</option>
                            </select>

                        </div>
                        <div class="form-group {{ $errors->has('nic') ? 'has-error' :'' }}">
                            <label for="exampleInputNIC">NIC Number</label>
                            <input type="text"  class="form-control" id="exampleInputNICnumber" value="{{ $user->nic }}" placeholder="NIC Number" name="nic" required>
                            @if($errors->has('nic'))<span class="help-block">{{ $errors->first('nic') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name" value="{{ $user->name }}" name="name" required>
                            @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUserType">Gender</label>

                            <select name="gender" class="form-control select2" style="width: 100%;">
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>

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

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-info">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('user-scripts')
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
    </script>

    @include('admin.partials.scripts.file-upload-preview')
@endsection