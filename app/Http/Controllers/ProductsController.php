<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::latest()->paginate(5);
        return view(view:'products.index', data: compact(var_name: 'products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'title' =>'required',
            'author' => 'required',
            'description' => 'required',
            'category' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if($cover = $request->file('cover')) {
            $destinationPath = 'cover/';
            $profileCover = date('YmdHis') . "." . $cover->getClientOriginalExtension();
            $cover->move($destinationPath, $profileCover);
            $input['cover'] = "$profileCover";
        }

        Products::create($input);
        return redirect()->route('products.index')
                        ->with('success', 'Products created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $input = $request->all();

        if ($cover = $request->file('cover')){
            $destinationPath = 'cover/';
            $profileCover = date('YmdHis') . "." . $cover->getClientOriginalExtension();
            $cover->move($destinationPath, $profileCover);
            $input['cover'] = "$profileCover";
        }else{
            unset($input['cover']);
        }
          
        $product->update($input);
    
        return redirect()->route('products.index')
                        ->with('success','Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','deleted');
    }
}
