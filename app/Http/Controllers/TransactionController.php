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
        $penerima = Transaction::groupBy('code')->orderBy('id','DESC')->where('code',$code)->first();
        $detail = Transaction::orderBy('id','DESC')->where('code',$code)->get();
        return view('admin.transaction.detail',compact('penerima','detail'));
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
