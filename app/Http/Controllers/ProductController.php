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
            'featured_image' => 'required|array', 
            'featured_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'descp' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'string|max:255',
            'quantity' => 'required|integer',
        ]);

        $images = $request->file('featured_image');

        $imagePaths = [];

        foreach ($images as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $imagePaths[] = 'public/images/' . $imageName;
        }

        

        $product = ProductModel::create([
            'name' => $request->name,
            'descp' => $request->descp,
            'price' => $request->price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'image_path' => implode(',', $imagePaths), 
        ]);

        return redirect()->route('products.addnew')->with('success', 'Product created successfully');
    
    
    }



    
}



