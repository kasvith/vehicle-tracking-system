@extends('admin.master')

@section('page-title', 'Add New Vehicle')
@section('optional-title', 'add a new vehicle to the system')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border ">
                    <h3 class="box-title">Fill the form for add new vehicle to the system </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="vehicleNumber">Vehicle Number:</label>
                            <input type="text" class="form-control" id="vehicleNumber" placeholder="Enter Vehicle Number" name="vehicle_number">
                        </div>
                        <div class="form-group">
                            <label for="vehicleColor">Color:</label>
                            <input type="text" class="form-control" id="vehicleColor" placeholder="Color" name="Color">
                        </div>
                        <div class="form-group">
                            <label for="engineNumber">Engine Number:</label>
                            <input type="text" class="form-control" id="engineNumber" placeholder="Enter Engine Number " name="engine_number">
                        </div>
                        <div class="form-group">
                            <label for="chassiNumber">Chassi Number:</label>
                            <input type="text" class="form-control" id="chassiNumber" placeholder="Enter Chassi Number " name="chassi_number">
                        </div>
                        <div class="form-group">
                            <label for="enguneCapacity">Chassi Number:</label>
                            <input type="text" class="form-control" id="enguneCapacity" placeholder="Enter Engine Capacity " name="engine_capacity">
                        </div>


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