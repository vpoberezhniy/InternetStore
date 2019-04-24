<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Intervention\Image\Facades\Image;
use App\Coment;

class ItemCardController extends Controller
{
    public function index()
    {
        $prod = Product::all();

        return view('home', compact('prod'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        $com = Coment::where('prod_id', '=', $product->id)->get();
        return view('shop.itemproduct', compact('product', 'com'));
    }

    public function category($id)
    {
        $products = Product::where('category_id', '=', $id)->paginate(20);
        $category = Category::find($id);
        return view('shop.show', compact('category', 'products'));

    }


    public function update(Request $request, $id)
    {
        //Функция для обновления колличества в сессии
    }




}