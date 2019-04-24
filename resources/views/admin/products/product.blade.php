@extends('adminlte::page')

@section('title')
    Base Product
@endsection
@section('content_header')
    <h1>Base Product</h1>
@stop

@section('content')
    <a href="{{url('/admin/products/create')}}"><button class="btn btn-info">Create New Product</button></a><br><br>

    <table id="product" class="display table">
        <thead>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Article</th>
            <th>Manufacturer</th>
            <th>price</th>
            <th>persent_sales (%)</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($prod as $value)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->article }}</td>
                <td>{{ $value->manufacturer }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->persent_sales }}</td>
                <td><a href="{{url('/admin/products/' . $value->id . '/edit')}}" ><buttor class="btn btn-info">Edit</buttor></a>
                    {!!Form::open(['url'=>'admin/products/'.$value->id,'method'=>'DELETE', 'style'=>'display:inline'])!!}
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
            $('#product').DataTable();
        } );
    </script>
@endsection