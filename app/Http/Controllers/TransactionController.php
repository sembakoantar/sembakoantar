<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Category;
use App\Models\sub_category;
use App\Models\Brand;

class TransactionController extends Controller
{
    public function index(){
        $transaction = Transaction::groupBy('code')->orderBy('id','DESC')->get();
        return view('admin.transaction.index',compact('transaction'));
    }

    public function detail($code){
        $id = Transaction::where('code',$code)->pluck('id')->toArray();
        $detail = Transaction::find($id)->all();
        $product = Product::find($detail[0]['product_id'])->name;
        $category = Category::find($detail[0]['category_id'])->name;
        return view('admin.transaction.detail',compact('detail','product','category'));
    }

    public function status($code, $status){
        
        if($status == 0){
            $change = '1';
        }
        else{
            $change = '0';
        }
    
        $transaction = Transaction::where('code',$code)->pluck('id')->toArray();
        Transaction::whereIn('id',$transaction)->update(['payment' => $change]);
        alert()->success(' ', 'Status Pembayaran Berhasil Diperbarui');
        return redirect('admin/transaction');
    }
}
