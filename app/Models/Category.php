<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    function Children()
    {

        return $this->hasMany('App\Models\sub_category','category_id');//One to Many
    }

    
}
