@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$product->name}}</h1>
            <div class="col-md-4">
                <a href="{{asset('avatar/'.$product->photo)}}" data-fancybox="gallery">
                    <img src="{{asset('avatar/'.$product->photo)}}" class="img-responsive" />
                </a>
            </div>
            <div class="col-md-4">
                <h2>Цена: {{$product->price}}грн.</h2>
                <p>Производитель: {{$product->manufacturer}}</p>
                <p>Артикул: {{$product->article}}</p>
                <p>Категория товара: {{$product->category->name}}</p>

                {!! Form::open(['url' => ['/cart/add'], 'method'=>'POST', 'class'=>'form-inline'  ]) !!}

                        {!! Form::text('qty', 1, ['class'=>'form-control']) !!}
                        {!! Form::hidden('id', $product->id) !!}
                        {!! Form::submit('Купить', ['class'=>'btn btn-info']) !!}

                {!! Form::close() !!}

                <p>Описание товара: {{$product->description}}</p>
            </div>
        </div>
        <br><br><br>
            {!! Form::open(['url'=>'/product'])  !!}
            <div class="form-group">
                {!! Form::label ('msg', 'Текст коментария:')!!}
                {!! Form::textarea('msg', '',['class'=>'form-control']) !!}
                {!! form::hidden('prod_id', $product->id) !!}
            </div>
            {!! Form::submit('Отправить',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}

        <br><br><hr><br>

        @foreach($com as $value)
            <p>{{$value->msg}}</p>
            <hr/>
        @endforeach

    </div>
@stop

