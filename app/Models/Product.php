<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $table = 'product';
    // function Children()
    // {

    //     return $this->hasMany('App\Models\Product','id');//One to Many
    // }
    protected $table = 'products';

    function parent()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');//Many to One
    }
    function parent2sub()
    {
        return $this->belongsTo('App\Models\sub_category','sub_category_id','id');//Many to One
    }
}
