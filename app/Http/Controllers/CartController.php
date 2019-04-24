<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;
use App\Product;

class CartController extends Controller
{
    public function addproduct(Request $request)
    {
        $prod = Product::find($request->id);
        Cart::add($prod, $request->qty);
        return redirect()->back();

    }

    public function show()
    {

        return view('shop.basket');
    }


    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('/basket');
    }

    public function delete()
    {
        Cart::deletecart();
        return redirect('/basket');
    }

}
