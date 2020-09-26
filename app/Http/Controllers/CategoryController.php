<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\sub_category;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::all();
        $sub_category=sub_category::where('parent');
        return view('admin.category.index',compact('category'));
    }
}
