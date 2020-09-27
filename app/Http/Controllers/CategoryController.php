<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\sub_category;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::all();
        $sub_category=sub_category::all();
        return view('admin.category.index',compact('sub_category','category'));
    }

    public function post(Request $request){
        //return $request->all();
        
    }
}
