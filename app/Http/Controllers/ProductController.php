<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('product', ['products' => $products]);
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('show', ['product' => $product]);
    }

    public function addToCart(Request $req){

        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->has('user');
            $cart->product_id = $req->productId;
            $cart->save();
            return redirect('/');
            
        }else{
            return redirect('/login');
        }
    }

    static function cartItem(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
}
