@extends('dashboard.layouts.master')
@section('title')
    List Reservations
@endsection
@section('content')
    @include('dashboard.layouts.message')

    <table class="table table-striped table-sm mt-3">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="10%">Number Of Person</th>
            <th width="15%">Table Reservatin</th>
            <th>Menu</th>
            <th width="22%">Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phoneNumber }}</td>
                <td>{{ $item->numOfPerson }}</td>
                <td>{{ $item->tableRes}}</td>
                <td>{{ $item->menu->nameOfMeal??''}}</td>

                <form action="{{route('dashboard.reservations.destroy',$item)}}" method="POST">
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route("dashboard.reservations.show",$item->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route("dashboard.reservations.edit",$item->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    @method("delete")
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("Are you sure?")'>Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$items->links()}}

@endsection



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
