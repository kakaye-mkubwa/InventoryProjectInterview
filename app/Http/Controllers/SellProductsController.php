<?php

namespace App\Http\Controllers;

use App\Models\ProductSales;
use App\Models\StockCart;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class SellProductsController extends Controller
{

    //TODO Create view

    /**
     * SellProductsController constructor.
     */
    public function __construct()
    {

    }

    public function show(){
        $products = $this->fetchProducts();
        $cart = $this->fetchCartItems();
        if ($cart != null){
            $sum = 0;
            foreach ($cart as $c){
                $sum += $c->sellingPrice * $c->quantity;
            }
        }
//        dd($cart);
        return view('sell-products')
            ->with(compact('products','cart','sum'));
    }

    public function fetchProducts(){
        return DB::table('product')
            ->orderBy('productName','ASC')
            ->get();
    }

    public function fetchCartItems(){
        return DB::table('cart')
            ->join('product','product.id','=','cart.productID')
            ->select('cart.*','product.productName')
            ->where('soldBy',Auth::user()->getAuthIdentifier())
            ->orderBy('created_at')
            ->get();
    }

    public function store(Request $request){
        $request->validate([
            'product_id'=>'required',
            'selling_price'=>'required|numeric|gt:0',
            'quantity'=>'required|numeric|gt:0',
        ]);

        $cart = new StockCart();

        $cart->productID = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->sellingPrice = $request->selling_price;
        $cart->soldBy = Auth::user()->getAuthIdentifier();
        $cart->vat = ($request->selling_price * 0.16);


        $cart->save();

        return redirect()->route('sell-products')
            ->with('status','Added to cart successfully');
    }

    public function checkout(Request $request){
        $request->validate([]);

        $cartItems = $this->fetchCartItems();

        foreach ($cartItems as $cartItem){
            $productSales = new ProductSales();

            $productSales->productID = $cartItem->productID;
            $productSales->quantity = $cartItem->quantity;
            $productSales->sellingPrice = $cartItem->sellingPrice;
            $productSales->soldBy = Auth::user()->getAuthIdentifier();
            $productSales->vat = $cartItem->sellingPrice;

            $productSales->save();

            StockCart::where('productID',$cartItem->productID)
                ->where('soldBy',$cartItem->soldBy)
                ->delete();
        }

        return redirect()->route('sell-products')
            ->with("status","sale successfully made");

    }
}
