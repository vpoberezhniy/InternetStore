@extends('adminlte::page')

@section('content')
    <table id="orders" class="display table">
        <thead>
        <tr>
            <th>Article</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderitem as $value)

            <tr>
                <td>{{ $value->article}}</td>
                <td>{{ $value->prod_name }}</td>
                {{--<td>{{ $value->qty }}</td>--}}
                <td>
                 {!!Form::open(['url'=>'admin/orders/'.$value->id,'method'=>'PUT'])!!}
                    {!! Form::text('qty', $value->qty, ['class'=>'form-control fdn']) !!}
                    {!! Form::hidden('order_id', $order->id, ['class'=>'form-control']) !!}
                    {!!Form::submit('Update', ['class'=>'btn btn-info'])  !!}
                    {!!Form::close()!!}

                </td>
                <td>{{ $value->prod_price }}</td>
                <td>{{ $value->prod_price * $value->qty }}</td>
                <td>
                    {!!Form::open(['url'=>'admin/delete-order-item/'. $value->id, 'method'=>'DELETE', 'style'=>'display:inline'])!!}
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
            $('#orders').DataTable();
        } );
    </script>
@endsection