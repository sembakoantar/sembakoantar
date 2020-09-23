<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(){
    	// $products = Product::all();
    	return view('home');
    	//echo "aus";
    }

    public function detail()
    {
    	return view('shopdetail');
    }

    public function category()
    {
    	return view('shopcategory');
    }

}
