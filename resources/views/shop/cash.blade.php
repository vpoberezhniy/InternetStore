@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                {!! Form::open(['url' => 'cash']) !!}
                <div class="form-group">
                    {!! Form::radio('name', 'Наложеный платеж', ['class'=>'form-control']) !!}
                    {!! Form::label('name', 'Наложеный платеж', ['class'=>'control-label']); !!}
                </div>
                <div class="form-group">
                    {!! Form::radio('name', 'Оплатить онлайн', ['class'=>'form-control']) !!}
                    {!! Form::label('name', 'Оплатить онлайн', ['class'=>'control-label']); !!}
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        {!! Form::submit('OK', ['class'=>'btn btn-info ']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection