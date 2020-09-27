<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    use HasFactory;
    protected $table = 'sub_category';

    function parent()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');//Many to One
    }
}
