<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Coment;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Product::all();
        return view('admin.products.product', compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = new Product();
        $cats = Category::pluck('name','id');
        return view('admin.products.create', compact('prod','cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'article' => 'required|max:20',
            'manufacturer' => 'required|max:100',
            'description' => 'required',
            'price' => 'required|max:10',
            'persent_sales' => 'required|max:100',
        ]);

        $prod = new Product();
        $prod->name = $request->name;
        if($request->slug)
            $prod->slug = $request->slug;
        else
            $prod->slug = $request->name;

        $prod->article = $request->article;
        $prod->manufacturer = $request->manufacturer;
        $prod->description = $request->description;
        $prod->price = $request->price;
        $prod->sales = $request->sales? 1 : 0;
        $prod->persent_sales = $request->persent_sales;
        $prod->category_id = $request->category_id;
        if($request->photo != null)
        {
            $file = $request->photo;
            $fName = $file->getClientOriginalName(); // Название изображения
            $file->move(public_path().'/avatar', $fName);
            $prod->photo = $fName;
            $img = Image::make(public_path().'/avatar/'. $fName);
            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path().'/avatar/small/'. $fName);
        };
        $prod->save();
        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $com = new Coment();
//        $com = Coment::find($id);
//        return view('shop.product', compact('com') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Product::find($id);
        $cats = Category::pluck('name','id');
        return view('admin.products.create', compact('prod', 'cats'));
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
        $prod = Product::find($id);
        $prod->name = $request->name;
        if($request->slug)
            $prod->slug = $request->slug;
        else
            $prod->slug = $request->name;
        $prod->article = $request->article;
        $prod->manufacturer = $request->manufacturer;
        $prod->description = $request->description;
        $prod->price = $request->price;
        $prod->sales = $request->sales? 1 : 0;
        $prod->persent_sales = $request->persent_sales;
        $prod->category_id = $request->category_id;


        $prod->save();
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        $prod->delete();
        return redirect('admin/products/');
    }
}
