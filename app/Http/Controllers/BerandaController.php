<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class BerandaController extends Controller
{
    public function index(){
        $produk = Product::take(12)->orderBy('id','DESC')->get();
    	return view('homepage',compact('produk'));
    }

    public function detail()
    {
    	return view('shopdetail');
    }

    public function category()
    {
    	return view('shopcategory');
    }

    public function template()
    {
        return view('template');
    }

    public function cobacontent()
    {
        return view('cobacontent');
    }

}
