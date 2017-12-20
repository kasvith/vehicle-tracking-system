@extends('admin.master')

@section('page-title', 'Edit owner')

@section('optional-title', 'Edit details of owner')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">enter information</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form role="form" method="post" action="{{ route('admin.owners.update', ['owner' => $owner->id]) }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' :'' }}">
                            <label for="title">Title</label>
                            <select class="form-control select2" id="title" style="width: 100%;" name="title">
                                <option value="mr"   {{ $owner->title == 'mr' ? 'selected' : '' }}>Mr.</option>
                                <option value="mrs"  {{ $owner->title == 'mrs' ? 'selected' : '' }}>Mrs.</option>
                                <option value="miss" {{ $owner->title == 'miss' ? 'selected' : '' }}>Miss</option>
                                <option value="rev"  {{ $owner->title == 'rev' ? 'selected' : '' }}>Rev.</option>
                            </select>
                            @if($errors->has('title'))<span class="help-block">{{ $errors->first('title') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('nic') ? 'has-error' :'' }}">
                            <label for="exampleInputNIC">NIC Number</label>
                            <input type="text"  class="form-control" id="exampleInputNICnumber" value="{{ $owner->nic }}" placeholder="NIC Number" name="nic" required>
                            @if($errors->has('nic'))<span class="help-block">{{ $errors->first('nic') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' :'' }}">
                            <label for="exampleInputName">First Name</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name" value="{{ $owner->first_name }}" name="first_name" required>
                            @if($errors->has('first_name'))<span class="help-block">{{ $errors->first('first_name') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' :'' }}">
                            <label for="exampleInputName">First Name</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter last name" value="{{ $owner->last_name }}" name="last_name" required>
                            @if($errors->has('last_name'))<span class="help-block">{{ $errors->first('last_name') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' :'' }}">
                            <label for="exampleInputUserType">Gender</label>

                            <select name="gender" class="form-control select2" style="width: 100%;">
                                <option value="male" {{ $owner->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $owner->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @if($errors->has('gender'))<span class="help-block">{{ $errors->first('gender') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' :'' }}">
                            <label for="datepicker">Date of Birth</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="date_of_birth" data-date-format="yyyy-mm-dd" value="{{ $owner->date_of_birth }}" style="width: 100%" id="datepicker">
                            </div>
                            @if($errors->has('date_of_birth'))<span class="help-block">{{ $errors->first('date_of_birth') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('district') ? 'has-error' :'' }}">
                            <label for="exampleInputName">District</label>
                            <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter district" value="{{ $owner->district }}" name="district">
                            @if($errors->has('district'))<span class="help-block">{{ $errors->first('district') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('province') ? 'has-error' :'' }}">
                            <label for="exampleInputName">Province</label>
                            <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter province" value="{{ $owner->province }}" name="province">
                            @if($errors->has('province'))<span class="help-block">{{ $errors->first('province') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
                            <label for="exampleInputName">Address</label>
                            <input type="text" class="form-control " id="exampleInputAddress" placeholder="Enter address" value="{{ $owner->address }}" name="address">
                            @if($errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
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

    <script src="/_admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('#datepicker').datepicker({
            autoclose: true
        })
    </script>
@endsection