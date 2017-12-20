@extends('admin.master')

@section('page-title', 'Add New Owner')
@section('optional-title', 'You can add a new Owner to the system')

@section('header-content')
    <link rel="stylesheet" href="/_admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.owners.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' :'' }}">
                            <label for="title">Title</label>
                            <select class="form-control select2" id="title" style="width: 100%;" name="title">
                                <option value="mr">Mr.</option>
                                <option value="mrs">Mrs.</option>
                                <option value="miss">Miss</option>
                                <option value="rev">Rev.</option>
                            </select>
                            @if($errors->has('title'))<span class="help-block">{{ $errors->first('title') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('nic') ? 'has-error' :'' }}">
                            <label for="exampleInputNIC">NIC Number</label>
                            <input type="text" class="form-control" id="exampleInputNICnumber" value="{{ old('nic') }}" placeholder="NIC Number" name="nic" required>
                            @if($errors->has('nic'))<span class="help-block">{{ $errors->first('nic') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' :'' }}">
                            <label for="exampleInputfName">First Name</label>
                            <input type="text" class="form-control" id="exampleInputfName" value="{{ old('first_name') }}" placeholder="Enter First Name" name="first_name" required>
                            @if($errors->has('first_name'))<span class="help-block">{{ $errors->first('first_name') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' :'' }}">
                            <label for="exampleInputlName">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputlName" value="{{ old('last_name') }}" placeholder="Enter Last Name" name="last_name">
                            @if($errors->has('last_name'))<span class="help-block">{{ $errors->first('last_name') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' :'' }}">
                            <label for="datepicker">Date of Birth</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="date_of_birth" value="{{ old('date_of_birth') }}" style="width: 100%" id="datepicker">
                            </div>
                            @if($errors->has('date_of_birth'))<span class="help-block">{{ $errors->first('date_of_birth') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' :'' }}">
                            <label for="gender">Gender</label>
                            <select class="form-control select2" id="gender" style="width: 100%;" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @if($errors->has('gender'))<span class="help-block">{{ $errors->first('gender') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
                            <label for="exampleInputAddress">Address</label>
                            <input type="text" class="form-control" id="exampleInputAddress" placeholder="Enter Owner Address"  value="{{ old('address') }}" name="address" required>
                            @if($errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' :'' }}">
                            <label for="exampleInputdis">District</label>
                            <input type="text" class="form-control" id="exampleInputdis" placeholder="District" value="{{ old('district') }}" name="district" required>
                            @if($errors->has('district'))<span class="help-block">{{ $errors->first('district') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('province') ? 'has-error' :'' }}">
                            <label for="exampleInputprovince">Province</label>
                            <input type="text" class="form-control" id="exampleInputprovince" value="{{ old('province') }}" placeholder="Province" name="province" required>
                            @if($errors->has('province'))<span class="help-block">{{ $errors->first('province') }}</span>@endif
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('user-scripts')
    <script src="/_admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('#datepicker').datepicker({
            autoclose: true
        })
    </script>
@endsection