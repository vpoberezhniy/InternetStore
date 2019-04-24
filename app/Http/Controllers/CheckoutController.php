<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Cart;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        return view('shop.checkout');
    }
    public function send(request $request)
    {

        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->deliver = $request->deliver;
        $order->comment = $request->comment;
        $order->summa = Session::get('summa');
        $order->status = 'new';
        $order->save();

        foreach (Session::get('cart') as $prod)
        {
            $orderitem = new OrderItem();
            $orderitem->order_id = $order->id;
            $orderitem->prod_name = $prod['name'];
            $orderitem->prod_price = $prod['price'];
            $orderitem->article = $prod['article'];
            $orderitem->qty = $prod['qty'];
            $orderitem->save();
        }

//        Cart::deletecart();
        return view('shop.cash');
    }

    public function cash()
    {
        return view('shop/cash');
    }

    public function del($id)
    {
        $orderitem = OrderItem::find($id);
        $orderitem->delete();
        return redirect('admin/orders/');
    }

    public function cashsend(request $request)
    {
         if($request->name == 'Наложеный платеж')
         {
             Cart::deletecart();
             return redirect('/');
         }
         else
             {

         }
    }

}
