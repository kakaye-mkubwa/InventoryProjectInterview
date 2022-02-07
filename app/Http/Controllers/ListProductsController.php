<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListProductsController extends Controller
{
    //TODO Create view

    public function show(){
        $products = $this->fetchAllProducts();
        return view('products-list')
            ->with(compact('products'));
    }

    public function fetchAllProducts(){
        return DB::table('product')
            ->orderBy('productName','ASC')
            ->paginate();
    }

    public function formatDate($date){
        return Carbon::createFromFormat('Y-m-d H:i:s',$date)
            ->format('d-M-Y H:i');
    }
}


