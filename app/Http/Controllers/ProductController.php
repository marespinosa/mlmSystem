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


    public function beautyProducts()
    {
        $products = ProductModel::all();

        return view('products.beautypro', ['products' => $products]);
    } 



    public function create()
    {
        return view('products.addnew');
    }

    public function store(Request $request)
    {
        $request->validate([
            'featured_image' => 'required',
            'featured_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'string|max:255',
            'descp' => 'string',
            'price' => 'numeric',
            'quantity' => 'integer',
            'category' => 'string',
        ]); 
    
        $files = [];
            if($request->hasfile('featured_image'))
            {
                foreach($request->file('featured_image') as $file)
                {
                    $name = time().rand(1,50).'.'.$file->extension();
                    $file->move(public_path('featured_image'), $name);  
                    $files[] = $name;  
                }
            }
    
        $product = ProductModel::create([
            'name' => $request->name,
            'descp' => $request->descp,
            'price' => $request->price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'image_path' => implode(',', $files),
            'category' => $request->category,
        ]);
    
        return redirect()->route('products.addnew')->with('success', 'Product created successfully');
    } 
    


    
}



