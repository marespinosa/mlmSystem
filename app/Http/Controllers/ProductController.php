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

    public function Cosmetics()
    {
        $products = ProductModel::all();

        return view('products.cosmetics', ['products' => $products]);
    } 

    public function FoodSuple()
    {
        $products = ProductModel::all();

        return view('products.foodcup', ['products' => $products]);
    } 

    public function homeCare()
    {
        $products = ProductModel::all();

        return view('products.homecare', ['products' => $products]);
    } 



    public function create()
    {
        return view('products.addnew');
    }

    public function store(Request $request)
    {
        $request->validate([
            'featured_image' => 'required',
            'name' => 'string|max:255',
            'descp' => 'string',
            'price' => 'numeric',
            'stockistprice' => 'numeric',
            'srp' => 'numeric',
            'quantity' => 'integer',
            'category' => 'string',
        ]); 

        $image_path = $request->file('featured_image')->store('featured_image', 'public');

    
        $product = ProductModel::create([
            'name' => $request->name,
            'descp' => $request->descp,
            'price' => $request->price,
            'stockistprice'  => $request->stockistprice,
            'srp'  => $request->srp,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'featured_image' => $image_path,
            'category' => $request->category,
        ]);

        return redirect()->route('products.addnew')->with('success', 'Product created successfully');
    } 
    


    
}



