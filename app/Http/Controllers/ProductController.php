<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;


class ProductController extends Controller
{
    public function create()
    {
        return view('products.index');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'descp' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

  
        ProductModel::create([
            'name' => $request->input('name'),
            'descp' => $request->input('descp'),
            'price' => $request->input('price'),
            'sku' => $request->input('sku'),
            'quantity' => $request->input('quantity'),
            'id' => auth()->id(), 
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
}
