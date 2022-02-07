<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    //
    public function show(){
        return view('add-product');
    }

    public function store(Request $request){
        $request->validate([
            'product_name'=>'required',
            'buying_price'=>'required|numeric|gt:0',
            'expected_selling_price'=>'required|numeric|gt:0',
            'quantity'=>'required|numeric|gt:0',
            'barcode'=>'required',
        ]);

        $product = new Product();

        $product->productName = $request->product_name;
        $product->buyingPrice = $request->buying_price;
        $product->expectedSellingPrice = $request->expected_selling_price;
        $product->quantity = $request->quantity;
        $product->barCode = $request->barcode;

        $product->save();

        return redirect()->route('add-products')->with('status','Product added successfully');
    }
}
