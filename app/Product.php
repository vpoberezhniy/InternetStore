<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function setSlugAttribute($value){
        $this->attributes['slug'] = str_slug($value,'-');
    }

    public function comment()
    {
        return $this->hasMany('App\Coment', 'prod_id');
    }
}
