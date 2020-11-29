<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    function product()
    {
        return $this->belongsTo('App\Models\Product');//Many to One
    }
}
