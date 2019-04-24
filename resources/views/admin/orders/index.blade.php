@extends('adminlte::page')

@section('content')
    <table id="order" class="display table">
        <thead>
        <tr>
            <th>№ Orders</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Deliver</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $value)

            <tr>
                <td>{{ $value->id}}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->phone }}</td>
                <td>{{ $value->deliver }}</td>
                <td>{{ $value->summa }}</td>
                <td>{{ $value->status }}</td>
                <td><a href="{{url('/admin/orders/' . $value->id . '/edit')}}" ><buttor class="btn btn-info">View</buttor></a>
                    {!!Form::open(['url'=>'admin/orders/'.$value->id,'method'=>'DELETE', 'style'=>'display:inline'])!!}
                    {!!Form::submit('Delete', ['class'=>'btn btn-danger'])  !!}
                    {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#order').DataTable();
        } );
    </script>
@endsection