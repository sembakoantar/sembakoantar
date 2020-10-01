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

    public function store(Request $request){
        $category = new Category;
        $sub_category = new sub_category;
        $sub_category->name = $request->sub_category;

        //tambah kategori baru
        if($request->category == "")
        {
            $category->name = $request->add_category;
            $category->type = $request->type;
            $category->save();
            $get_category_id = Category::orderBy('id', 'desc')->get();
            $sub_category->category_id = $get_category_id[0]['id'];
            $sub_category->save();
        }
        else{
            $sub_category->category_id = $request->category;
            $sub_category->save();
        }
        return redirect()->back();
    }

    public function edit(Request $request,$id){
        $sub_category=sub_category::find($id);
        $category=category::all();
        return view('admin.category.edit',compact('sub_category','category'));
    }

    public function update(Request $request,$id){
        $sub_category=sub_category::find($id);
        $category=category::Find($request->category_id);
        $sub_category->name = $request->sub_category;
        $category->type = $request->type;
        $sub_category->category_id = $category->id;
        $category->save();
        $sub_category->save();
        return redirect()->route('category.index');
    }
}
