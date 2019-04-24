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
                    <table class="table">
                        <thead>
                        <tr>
                            {{--<th>id</th>--}}
                            <th>Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Cash</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session('cart') as $product)
                        <tr>
                            {{--<td>{{$product['id']}}</td/>--}}
                            <td>{{$product['name']}}</td>
                            <td><img src="{{asset('avatar/small/'. $product['photo'])}}" alt="foto"></td>
                            <td>{{$product['qty']}}</td>
                            {{--<td>--}}
                                {{--{!!Form::open(['url'=>'shop/basket/'.$product['qty'],'method'=>'PUT', 'style'=>'display:inline'])!!}--}}
                                {{--{!! Form::text('qty', $product['qty'], ['class'=>'form-control fdn']) !!}--}}
                                {{--{!! Form::hidden('order_id', $order->id, ['class'=>'form-control']) !!}--}}
                                {{--{!!Form::submit('Update', ['class'=>'btn btn-info'])  !!}--}}
                                {{--{!!Form::close()!!}--}}

                            {{--</td>--}}
                            <td>{{$product['price']}}</td>
                            <td>{{$product['price'] * $product['qty'] }}</td>
                            <td>
                                {!!Form::open(['url'=>'basket/'.$product['id'],'method'=>'DELETE', 'style'=>'display:inline'])!!}
                                {!!Form::submit('Delete', ['class'=>'btn btn-danger'])  !!}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="total"> {{--Доработать--}}
                        К оплате: <span>{{session('summa')}}</span>
                    </div>
                </div>
            </div>
                <div class="basketbtn">
                    <a href="{{url('/checkout')}}">
                        <button class="btn btn-info">Checkout</button>
                    </a>
                    <a href="{{url('basket/delete')}}">
                        <button class="btn btn-danger">Clear Basket</button>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="basket_msg">
            <h2>Your basket is empty!!! check item please....</h2>
            <h3>Click the button to go to the general page.</h3>
            <a href="/"><button class="btn btn-danger">General page</button></a>
        </div>
    @endif




@endsection