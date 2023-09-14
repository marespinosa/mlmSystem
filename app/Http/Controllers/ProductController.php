<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('products.addnew');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descp' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new ProductModel([
            'name' => $request->input('name'),
            'descp' => $request->input('descp'),
            'price' => $request->input('price'),
            'sku' => $request->input('sku'),
            'quantity' => $request->input('quantity'),
            'featured_image' => $imageName,
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->featured_image = $imageName;
        }

        $product->save();

       

        return redirect()->route('products.addnew')->with('success', 'Product created successfully');
    }



    
}



