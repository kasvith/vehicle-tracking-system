@extends('admin.master')

@section('page-title', 'Add New Admin/Officer')
@section('optional-title', 'You can add a new Admin/Officer to the system')

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
                            <label for="exampleInputUserType">User Type</label>

                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            name="type">
                                <option value="admin">Admin</option>
                                <option value="officer">Officer</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="Name" class="form-control" id="exampleInputName" placeholder="Enter User Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNIC">NIC Number</label>
                            <input type="NICnumber" class="form-control" id="exampleInputNICnumber" placeholder="NIC Number" name="nic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">E-mail</label>
                            <input type="Email" class="form-control" id="exampleInputEmail" placeholder="Enter User E-mail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Address</label>
                            <input type="Address" class="form-control" id="exampleInputAddress" placeholder="Enter User Address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">User Image</label>
                            <input type="file" id="exampleInputFile">

                            <p class="help-block">Use .xxx images only.</p>
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