<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Product_Order;
use Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function product_details(Request $request){
        if($request->user_id){

            $prod_det = [];
            $product = Product::where('id', $request->user_id)->first();
            $prod_det['id']=$product->id;
            $prod_det['name']=$product->name;
            $prod_det['description']=$product->description;
            $prod_det['image']=$product->image;
            $prod_det['price']=$product->price;
            $prod_det['quantity']=$product->quantity;
            return str_replace("'", "'", json_encode( $prod_det));
        }
    }

    public function view()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function orders()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    public function cart()
    {
        if(!Auth::check())
        {
            return redirect()->guest('login');
        }
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function edit(Request $request)
    {
        #echo '<pre>'; print_r($request->all()); echo '</pre>'; exit;

        ## Validation rules
        $rules['brand_name'] = 'required|min:2';
        $rules['prod_desc'] = 'required|min:2';
        $rules['prod_price'] = 'required|numeric';
        $rules['quantity'] = 'required|numeric';

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/products')
                        ->withErrors($validator)
                        ->withInput();
        }

        ## Create object to save the product details..
        //$product = Product::findOrFail($id);

        if(isset($request->prod_img) && $request->prod_img->getClientOriginalExtension() != ""){
            $imageName = time().'.'.$request->prod_img->getClientOriginalExtension();
        }

        //$product->id = $request->pid;

        $product['name'] = $request->brand_name;
        $product['description'] = $request->prod_desc;
        if(isset($request->prod_img) && $request->prod_img->getClientOriginalExtension() != ""){
            $product['image'] = $imageName;
        }
        $product['price'] = $request->prod_price;
        $product['quantity'] = $request->quantity;

        if(isset($request->prod_img) && $request->prod_img->getClientOriginalExtension() != ""){
            $request->prod_img->move(public_path('/products_images'), $imageName);
        }

        Product::where('id', $request->pid)->update($product);
        //$product->update();

        return redirect('admin/products');

    }

    public function add(Request $request)
    {
        ## Validation rules
        $rules['brand_name'] = 'required|min:2';
        $rules['prod_desc'] = 'required|min:2';
        $rules['prod_img'] = 'required';
        $rules['prod_price'] = 'required|numeric';
        $rules['quantity'] = 'required|numeric';

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('admin/products')
                        ->withErrors($validator)
                        ->withInput();
        }

        ## Create object to save the product details..
        $product = new Product();
        $imageName = time().'.'.$request->prod_img->getClientOriginalExtension();
        $product->name = $request->brand_name;
        $product->description = $request->prod_desc;
        $product->image = $imageName;
        $product->price = $request->prod_price;
        $product->quantity = $request->quantity;

        $request->prod_img->move(public_path('/products_images'), $imageName);

        $product->save();

        return redirect('admin/products');
    }

    public function delete($id){

        $product = Product::find($id);
        $product->delete();
        return redirect('admin/products');
    }

    public function place_order(Request $request)
    {

        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        $order_arr = $request->session_arr;
        $manage = json_decode($order_arr, true);

        $total = 0;
        $order_num = random_int(100000, 999999);

        if(!empty($manage)){
            foreach($manage as $key => $val){
                $prod_order = new Product_Order();
                $prod_order->product_id = $key;
                $prod_order->order_id = $order_num;
                $prod_order->product_quantity = $val['quantity'];
                $prod_order->save();
                $total += ($val['quantity'] * $val['price']);
            }
        }

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->email = $request->user_email;
        $order->amount = $total;
        $order->order_number = $order_num;
        $order->order_date = date("Y-m-d H:i:s");
        $order->email_status = 1;
        $order->order_status = 1;
        $order->save();

        ## Email functionality here
        // $cart = session()->get('cart');
        // if(!empty($cart)){
        //     unset($cart);
        // }

        //$data = array('name'=>"Rahul Nathe");
        //Mail::send(['text'=>'mail'], $data, function($message) {
            //$message->to('rahul8218@gmail.com', 'E-Mobile Site')->subject('You order details..');
            //$message->from('01rahulnathe@gmail.com','Rahul Nathe');
        //});

        echo "Email Sent. Check your inbox.";

    }

}
