<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\sub_category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=Brand::all();
        $product = Product::all();
        $category=Category::all();
        $sub_category=sub_category::all();
        return view('admin.product.index',compact('brand','product','category','sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::all();
        $category=Category::all();
        $sub_category=sub_category::all();
        return view('admin.product.add',compact('brand','category','sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $product = new Product;
        $brand = new Brand;
        $product->name = $request->name;
        // $product->photo = $request->photo;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->price_box = $request->price_box;
        if($request->brand == "")
        {
            $brand->name = $request->add_brand;
            $brand->save();
        }
        else{
            $product->brand_id = $request->brand;
        }
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $photo = $request->file('photo');
        $photo_name = $photo->getClientOriginalName();
        $request->file('photo')->move('img/product',$photo_name);
        $product->photo = $photo_name;
        $product->save();

        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
