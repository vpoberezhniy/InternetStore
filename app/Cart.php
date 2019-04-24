<?php

namespace App;
use Illuminate\Support\Facades\Session;

class Cart
{
   public static function add($prod,$qty)
   {
       if(Session::get("cart.prod_{$prod->id}")){
           $oldCount = Session::get("cart.prod_{$prod->id}.qty");
           Session::put("cart.prod_{$prod->id}.qty", $qty + $oldCount);
       }
       else {
           Session::put("cart.prod_{$prod->id}.id", $prod->id);
           Session::put("cart.prod_{$prod->id}.qty", $qty);
           Session::put("cart.prod_{$prod->id}.price", $prod->price);
           Session::put("cart.prod_{$prod->id}.name", $prod->name);
           Session::put("cart.prod_{$prod->id}.photo", $prod->photo);
           Session::put("cart.prod_{$prod->id}.article", $prod->article);
       }
       Session::put('summa', self::summa());
   }

   public static function summa()
   {
       $summ = 0;

       foreach (Session::get('cart') as $prod)
       {
          $summ += $prod['price'] * $prod['qty'];
       }
       return $summ;
   }

    public static function remove($id)
    {
        Session::forget("cart.prod_{$id}");
        Session::put('summa', self::summa());
    }

    public static function deletecart()
    {
        Session::forget("cart");
        Session::forget('summa');
    }
}
