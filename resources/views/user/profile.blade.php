@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($user->avatar)
                <img src="{{asset('avatar/small/'.$user->avatar)}}" class="img-circle avatar_position">
            @else
                <img src="{{asset('images/ava.jpg')}}" class="img-circle avatar_position">
        @endif
            <br><br>
            {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method'=>'PUT', 'files' => true, 'class'=>'form-horizontal'  ]) !!}
            <div class="form-group">
                {!! Form::label('avatar', 'Your photo:', ['class'=>'control-label col-sm-3']); !!}
                <div class="col-sm-9">
                    {!! Form::file('avatar', null, ['class'=>'form-control']) !!}
                </div>
            </div>
        <div class="form-group">
            {!! Form::label('name', 'User Name:', ['class'=>'control-label col-sm-3']); !!}
            <div class="col-sm-9">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:', ['class'=>'control-label col-sm-3']); !!}
            <div class="col-sm-9">
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>
        </div>
            <div class="form-group">
                {!! Form::label('phone', 'Phone:', ['class'=>'control-label col-sm-3']); !!}
                <div class="col-sm-9">
                    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
                </div>
            </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:', ['class'=>'control-label col-sm-3']); !!}
            <div class="col-sm-9">
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('pswd', 'Repead Password:', ['class'=>'control-label col-sm-3']); !!}
            <div class="col-sm-9">
                {!! Form::password('pswd', ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {!! Form::submit('Save profile', ['class'=>'btn btn-info']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@stop