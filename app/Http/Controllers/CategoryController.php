<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\sub_category;
//use Alert;
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
        alert()->success(' ', 'Berhasil');
        return redirect()->route('category.index');
    }

    public function edit(Request $request,$id){
        $sub_category=sub_category::find($id);
        $category=Category::all();
        return view('admin.category.edit',compact('sub_category','category'));
    }

    public function update(Request $request,$id){
        $sub_category=sub_category::find($id);
        $category=Category::Find($request->category_id);
        $sub_category->name = $request->sub_category;
        $category->type = $request->type;
        $sub_category->category_id = $category->id;
        $category->save();
        $sub_category->save();
        alert()->success(' ', 'Berhasil');
        return redirect()->route('category.index');
    }

    public function destroy(Request $request,$id){
        $sub_category = sub_category::find($id);
        //$category = Category::find($sub_category->category_id);
        $sub_category->delete();
        //$category->delete();
        alert()->success(' ', 'Berhasil');
        return redirect()->route('category.index');
    }
}
