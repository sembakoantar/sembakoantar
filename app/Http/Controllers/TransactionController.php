<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Transaction;

class TransactionController extends Controller
{
    public function index(){
        return view('admin.transaction.index');
    }
}
