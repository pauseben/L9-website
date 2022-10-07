<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    
   /**
    * It returns a view of all orders
    */
    public function index()
    {
        $orders = Order::All();
        return view('admin.all-orders',compact('orders'));
    }

    /**
     * It takes an order object and returns a view with the order and all products
     * 
     * @param Order order The order object that we're going to show.
     */
    public function show(Order $order)
    {
        $products = Product::All();
        return view('admin.show-order',compact('order','products'));
    }

   /**
    * It creates a new order in the database.
    * 
    * @param Request request The request object.
    * 
    * @return The return value of the last statement executed in the function.
    */
    public function store(Request $request)
    {
       // $data = $request;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'leves' => 'required',
            'a_menu' => 'required',
            'b_menu' => 'required',
            'datum' => 'required',
            'user_id' => 'required',
        ],[
            'name.required' => 'Név mező kötelező',
            'email.required' => 'E-mail mező kötelező',
            'phone.required' => 'Telefonszám mező kötelező',
            'leves.required' => 'Leves mező kötelező',
            'a_menu.required' => 'A menü mező kötelező',
            'b_menu.required' => 'B menü mező kötelező',
            'user_id.required' => 'USERID mező kötelező',
        ]);
      
        Order::create($request->all());
       
        return back()->with('success', 'Sikeres rendelés leadás');
    }

    /**
     * It returns a view of all the orders and products in the database
     */
    public function my_orders()
    {
        $orders = Order::where('user_id',auth()->user()->id)->get();
        $products = Product::All();
      
        return view('pages.my-orders',compact('orders','products'));
    }
}
