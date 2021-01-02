@extends('dashboard.layouts.master')
@section("title","Show Reservations")
@section('content')
    <!-- Main content -->
    <section class="content">
<div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input readonly autofocus='true' type="text" name="name" value="{{$item->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> Email</label>
                                <input readonly autofocus='true' type="text" name="email" value="{{$item->email}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> Phone Number</label>
                                <input readonly autofocus='true' type="text" name="phoneNumber" value="{{$item->phoneNumber}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Number Of Person</label>
                                <input readonly autofocus='true' type="text" name="numOfPerson" value="{{$item->numOfPerson}}" class="form-control">
                                <label for="inputName">Table Reservation Number</label>
                                <input readonly autofocus='true' type="text" name="tableRes" value="{{$item->tableRes}}" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city">Menu</label>
                                    <input readonly type="text" value='{{ $item->menu->nameOfMeal??'' }}'
                                           class="form-control" >
                                </div>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{route("dashboard.reservations.index")}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
</div>
    </section>

    <!-- /.content -->
@endsection

