@extends('adminlte::page')

@section('title')
    Category Page
@endsection
@section('content_header')
    <h1>Category Page</h1>
@stop

@section('content')
    <a href="{{url('/admin/category/create')}}"><button class="btn btn-info">Create New Category</button></a><br><br>

    <table id="cat" class="display table">
        <thead>
        <tr>
            <th>№</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cats as $categories)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $categories->name }}</td>
                <td><a href="{{url('/admin/category/' . $categories->id . '/edit')}}" ><buttor class="btn btn-info">Edit</buttor></a>
                    {!!Form::open(['url'=>'admin/category/'.$categories->id,'method'=>'DELETE', 'style'=>'display:inline'])!!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
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
            $('#cat').DataTable();
        } );
    </script>
@endsection