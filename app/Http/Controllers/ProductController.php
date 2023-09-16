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

    public function viewAll()
    {
        $products = ProductModel::all();

        return view('products.all', ['products' => $products]);
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

    public function editProduct($id)
    {
        $product = ProductModel::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
        return view('products.edit', compact('product.edit'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'descp' => 'required',
            'price' => 'required|numeric',
            'stockistprice' => 'required|numeric',
            'srp' => 'required|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required|unique:products,sku,' . $id, // Check for uniqueness except for the current product
            'category' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for the image upload
        ]);
    
        $product = ProductModel::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        $product->name = $request->input('name');
        $product->descp = $request->input('descp');
        $product->price = $request->input('price');
        $product->stockistprice = $request->input('stockistprice');
        $product->srp = $request->input('srp');
        $product->quantity = $request->input('quantity');
        $product->sku = $request->input('sku');
        $product->category = $request->input('category');
    
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('featured_images', 'public');
            $product->featured_image = $imagePath;
        }
    
        $product->save();
    
        return redirect()->back()->with('success', 'Product updated successfully');
    }
    

    
}



