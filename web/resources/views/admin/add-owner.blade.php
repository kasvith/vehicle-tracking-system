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
                            <label for="exampleInputUserType">Title</label>

                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            name="title">
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Rev">Rev.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNIC">NIC Number</label>
                            <input type="NICnumber" class="form-control" id="exampleInputNICnumber" placeholder="NIC Number" name="nic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">First Name</label>
                            <input type="fName" class="form-control" id="exampleInputfName" placeholder="Enter First Name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Last Name</label>
                            <input type="lName" class="form-control" id="exampleInputlName" placeholder="Enter Last Name" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUserType">Gender</label>

                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                name="sex">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Address</label>
                            <input type="Address" class="form-control" id="exampleInputAddress" placeholder="Enter Owner Address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">District</label>
                            <input type="dis" class="form-control" id="exampleInputdis" placeholder="District" name="district">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Province</label>
                            <input type="province" class="form-control" id="exampleInputprovince" placeholder="Province" name="adsress">
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