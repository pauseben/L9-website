<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::All();
      
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::All();
        return view('products.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'datum' => 'required',
            'leves' => 'required',
            'a_menu' => 'required',
            'b_menu' => 'required',
        ]);
      
        Product::create($request->all());
        activity()
            ->event('create')
            ->log('Termék létrehozása');
        return redirect()->route('products.index')
                        ->with('success','A termék sikeresen létrehozva');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::All();
        return view('products.edit',compact('product','products'));
    }

        
    /**
     * The function takes a request and a product as parameters, validates the request, and then updates
     * the product
     * 
     * @param Request request The request object represents the HTTP request and has properties for the
     * request query string, parameters, body, HTTP headers, and so on.
     * @param Product product The product model instance that we are updating.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'datum' => 'required',
            'leves' => 'required',
            'a_menu' => 'required',
            'b_menu' => 'required',
        ]);
      
        $product->update($request->all());
        activity()
                ->event('update')
                ->withProperties(['id' => $product->id])
                ->log('Termék szerkesztése');
        return redirect()->route('products.index')
                        ->with('success','A termék sikeresen frissítve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        activity()
                ->event('delete')
                ->withProperties(['id' => $product->id])
                ->log('Termék törlése');
        $product->delete();
       
        return redirect()->route('products.index')
                        ->with('success','A termék sikeresen törölve');
    }


/**
 * This function is used to display the food delivery page
 */
    public function food_delivery()
    {
        $products = Product::whereMonth('datum', date('m'))
        ->whereYear('datum', date('Y'))
       /* ->whereDay('datum', '>',date('d'))*/
        ->orderBy('datum', 'asc')
        ->get();
       
      
        return view('pages.food-delivery',compact('products'));
    }

    
}
