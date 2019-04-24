@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
@stop

@section('title')
    Category
@endsection
@section('content_header')
    <h1>Create New Category</h1>
@stop

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <br><br><br>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(!$cats->name)
            {!! Form::model($cats, ['route' => ['category.store'], 'class'=>'form-horizontal'  ]) !!}
        @else
            {!! Form::model($cats, ['route' => ['category.update', $cats->id], 'method'=>'PUT', 'class'=>'form-horizontal'  ]) !!}
        @endif

        <div class="form-group">
            {!! Form::label('name', 'Category Name:', ['class'=>'control-label col-sm-3']); !!}
            <div class="col-sm-9">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
        </div>
            <br>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {!! Form::submit('Save', ['class'=>'btn btn-info']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@endsection
