<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use Auth;


class HomeController extends Controller
{
    public function index()
    {
        if (isset(Auth::user()->user_type) && Auth::user()->user_type == "Administrator"){
            //
        }else if(isset(Auth::user()->user_type) && Auth::user()->user_type == "Guest"){
            return redirect('/home');
        }else{
            return redirect('/login');
        }

        $products = Product::all();
        $orders = Order::all();

        return view('home', compact('products', 'orders'));
    }
}
