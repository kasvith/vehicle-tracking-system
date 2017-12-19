@extends('admin.master')

@section('page-title', 'Add New Owner')
@section('optional-title', 'You can add a new Owner to the system')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>

                            <select class="form-control select2" id="title" style="width: 100%;" name="title">
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Rev">Rev.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNIC">NIC Number</label>
                            <input type="text" class="form-control" id="exampleInputNICnumber" placeholder="NIC Number" name="nic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputfName">First Name</label>
                            <input type="text" class="form-control" id="exampleInputfName" placeholder="Enter First Name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlName">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputlName" placeholder="Enter Last Name" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>

                            <select class="form-control select2" id="gender" style="width: 100%;" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Address</label>
                            <input type="text" class="form-control" id="exampleInputAddress" placeholder="Enter Owner Address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputdis">District</label>
                            <input type="text" class="form-control" id="exampleInputdis" placeholder="District" name="district">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputprovince">Province</label>
                            <input type="text" class="form-control" id="exampleInputprovince" placeholder="Province" name="adsress">
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