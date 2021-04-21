<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

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

    public function cartList(){

        //Get the user Id of the current logged in user
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products', 'products.id', '=', 'cart.product_id')
        ->where('cart.user_id', $userId)
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('cartList',['products' => $products]);
    }

    public function removeCart($id){
        Cart::destroy($id);
        return redirect('cartList');
    }

    public function orderNow(){
        //Get the user Id of the current logged in user
        $userId = Session::get('user')['id'];
        $totalPrice = DB::table('cart')
        ->join('products', 'products.id', '=', 'cart.product_id')
        ->where('cart.user_id', $userId)
        ->sum('products.price');

        return view('orderNow',['totalPrice' => $totalPrice]);

    }

    public function orderPlaced(Request $req){

        $userId = Session::get('user')['id'];
        $allCart =  Cart::where('user_id', $userId)->get();
        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id=$cart->product_id;
            $order->user_id=$cart->user_id;
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->address=$req->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }


        return redirect('/');
    }

    public function myOrders(){
        $userId = Session::get('user')['id'];
        $orders =  DB::table('orders')
        ->join('products', 'products.id', '=', 'orders.product_id')
        ->where('orders.user_id', $userId)
        ->get();

        return view('myOrders', ['orders' => $orders]);
    }


}
