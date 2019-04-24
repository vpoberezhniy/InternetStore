@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        @if(count(session('cart')) > 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <ul class="list-group">

                                @foreach($categoryOnSidebar as $catSidebar)

                                    <a href="{{url('/category/'.$catSidebar->id)}}"
                                       class="list-group-item list-group-item-action
                                    {{Request::is('/category/'.$catSidebar->id)?'active':''}}">{{$catSidebar->name}}
                                        <span class="badge badge-primary">{{$catSidebar->product->count()}}</span></a>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9">
                        {!! Form::open(['route' => ['checkout'], 'class'=>'form-horizontal'  ]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Your Name:', ['class'=>'control-label col-sm-3']); !!}
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
                            {!! Form::label('deliver', 'Where to deliver?', ['class'=>'control-label col-sm-3']); !!}
                            <div class="col-sm-9">
                                {!! Form::text('deliver', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('comment', 'Comment', ['class'=>'control-label col-sm-3']); !!}
                            <div class="col-sm-9">
                                {!! Form::textarea  ('comment', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                {!! Form::submit('Send', ['class'=>'btn btn-info checkoutbtn']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
    </div>

    @endif


@endsection