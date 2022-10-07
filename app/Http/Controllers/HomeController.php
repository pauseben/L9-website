<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->getRoleNames()[0] == 'Super-Admin' || auth()->user()->getRoleNames()[0] == 'admin' ){

            $users = User::orderBy('id', 'DESC')->limit(3)->get();
            $usersCount = User::All()->count();
            $orders = Order::orderBy('id', 'DESC')->limit(3)->get();
            $ordersCount = Order::All()->count();

            $set_folder_path = "storage/uploads";
            $forder_size = format_Size(folder_Size($set_folder_path));

            return view('admin.dashboard',compact('users','usersCount','orders','ordersCount','forder_size'));
        }else if(auth()->user()->getRoleNames()[0] == 'user' ){
            return view('home');
        }
        
    }

}
