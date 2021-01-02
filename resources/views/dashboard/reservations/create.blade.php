@extends('dashboard.layouts.master')
@section("title","Create Reservation")
@section('content')
    @include('dashboard.layouts.message')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{route('dashboard.reservations.store')}}" enctype="multipart/form-data">
            @csrf
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
                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> Email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> Phone Number</label>
                                <input type="text" name="phoneNumber" value="{{old('phoneNumber')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Number Of Person</label>
                                <input type="text" name="numOfPerson" value="{{old('numOfPerson')}}" class="form-control">
                                <label for="inputName">Table Reservatin Number</label>
                                <input type="text" name="tableRes" value="{{old('tableRes')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Menu</label>
                                <select class="form-control custom-select" name="menu_id">
                                    <option selected disabled>Select one</option>
                                    @foreach($menus as $menu)
                                        <option value="{{$menu->id}}">{{$menu->nameOfMeal}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fileImage">
                                <label class="custom-file-label" for="customFile">Choose file</label>
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
                    <input type="submit" value="Create new Reservation" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
