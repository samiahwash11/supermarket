<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('product.index', compact('products'));
    }

    public function trashedProducts()
    {
        $products = Product::withTrashed()->get();
        return view('product.trash', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request -> validate([
            "name"=> "required",
            "price"=> "required",
            "detail"=> "required",
        ]);
        $product = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'detail'=>$request->detail
        ]);
        return redirect()->route('product.index')
        ->with('success','product added successflly');    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            "name"=> "required",
            "price"=> "required",
            "detail"=> "required",
        ]);
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'detail'=>$request->detail
        ]);
        return redirect()->route('product.index')
        ->with('success','product updated successflly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
        ->with('success','product deleted successflly');
    }

    public function softDelete( $product)
    {
        $product = product:: find($product)->Delete();
        return redirect()->route('product.index')
        ->with('success','product deleted successflly');
    }
}
