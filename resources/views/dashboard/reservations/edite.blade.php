@extends('dashboard.layouts.master')
@section("title","Update Reservation")
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{route('dashboard.reservations.index',$reservation)}}" >
            @method('PUT')
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
                                <input type="text" name="name" value="{{$reservation->name}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName"> Email</label>
                                <input type="text" name="email" value="{{$reservation->email}}" class="form-control">

                            </div>

                            <div class="form-group">
                                <label for="inputName"> Phone Number</label>
                                <input type="text" name="phoneNumber" value="{{$reservation->phoneNumber}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Number Of Person</label>
                                <input type="text" name="numOfPerson" value="{{$reservation->numOfPerson}}" class="form-control">
                                <label for="inputName">Table Reservatin Number</label>
                                <input type="text" name="tableRes" value="{{$reservation->tableRes}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Menu</label>
                                <select class="form-control custom-select" name="menu_id">
                                    @foreach($menus as $menu)
                                        <option value="{{$menu->id}}"
                                                {{$reservation->menu_id == $menu->id ? 'selected' : ''}}
                                        >{{$menu->nameOfMeal}}</option>
                                    @endforeach
                                </select>
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
                    <input type="submit" value="Update Reservation" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
