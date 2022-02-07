<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    //
    public function show(){
        $sales = $this->fetchProductSales();
//        dd($sales);
        return view('products-sales')
            ->with(compact('sales'));
    }

    public function fetchProductSales(){
        return DB::table('product_sales')
            ->join('product','product.id','=','product_sales.productID')
            ->join('users','users.id','=','product_sales.soldBy')
            ->select('product_sales.*','product.barCode','product.productName','users.name')
            ->orderBy('created_at')
            ->paginate();
    }
}
