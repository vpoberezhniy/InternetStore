@extends('layouts.app')

@section('content')
 <div class="container">
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
            <div class="panel panel-default">
               <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="products">
                        @foreach($products as $value)

                            <div class="product">
                                <div><a href="{{url('product/'.$value->slug)}}">
                                        <h4 >{{ $value->name }}</h4>
                                        <img src="{{asset('avatar/small/'.$value->photo)}}" />
                                        <h4 class="text-danger">{{ $value->price }}&nbspгрн.</h4>
                                    </a>
                                    {!! Form::open(['url' => ['/cart/add'], 'method'=>'POST', 'class'=>'form-inline'  ]) !!}
                                    {!! Form::hidden('id', $value->id) !!}
                                    {!! Form::submit('Купить', ['class'=>'btn btn-info']) !!}
                                    {!! Form::text('qty', 1, ['class'=>'form-control fdn']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                        <div>{{$products->links()}}</div>
                </div>
            </div>
        </div>
@endsection