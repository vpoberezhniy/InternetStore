<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('admin.orders.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $orderitem = OrderItem::where('order_id', '=', $id)->get();
        return view('admin.orders.edit', compact('order', 'orderitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderitem = OrderItem::find($id);
        $order = Order::find($request->order_id);
        $order->summa = $order->summa - $orderitem->qty*$orderitem->prod_price + $request->qty*$orderitem->prod_price;
        $orderitem->qty = $request->qty;
        $orderitem->save();
        $order->save();

        return redirect('/admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $order = Order::find($id);
            $order->delete();
            return redirect('admin/orders/');
    }

    public function destroyOrderItem($id)
    {
        $orderitem = OrderItem::find($id);
        $order = Order::find($orderitem->order_id);
        $order->summa = $order->summa - $orderitem->qty*$orderitem->prod_price;
        $order->save();
        $orderitem->delete();
        return redirect('admin/orders/');
    }
}
