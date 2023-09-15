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



    public function index()
    {
        $products = ProductModel::all();

        return view('products.index', ['products' => $products]);
    } 

    public function create()
    {

        return view('products.addnew');
    }

    public function store(Request $request)
    {
        $request->validate([
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'string|max:255',
            'descp' => 'string',
            'price' => 'numeric',
            'quantity' => 'integer',
            'category' => 'string',
        ]); 
    
        $image_path = $request->file('featured_image')->store('images', 'public');

    
        $product = ProductModel::create([
            'name' => $request->name,
            'descp' => $request->descp,
            'price' => $request->price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'featured_image' => $image_path,
            'category' => $request->category,
        ]);
    
        return redirect()->route('products.addnew')->with('success', 'Product created successfully');
    }
    


    
}



