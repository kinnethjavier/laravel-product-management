<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    // Create POST Method
    public function store(Request $request) {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required',
        ]);

        $data = $request->all();

        // photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('images/products'), $fileName);
            $data['photo'] = $fileName;
        }

        // check if nullable fields are null
        $data = array_merge([
            'specification' => null,
            'color' => null,
            'size' => null,
        ], $data);

        $check = $this->create($data);

        return redirect("products")->with('success', 'New product added.');
    }

    public function create(array $data)
    {
      return Product::create([
        'added_by' => Auth::user()->id,
        'product_name' => $data['product_name'],
        'description' => $data['description'],
        'price' => $data['price'],
        'photo' => $data['photo'],
        'category' => $data['category'],
        'specification' => $data['specification'],
        'color' => $data['color'],
        'size' => $data['size'],
      ]);
    }

    // Retrieve all products (View)
    public function show() {
        if(Auth::check()){
            $productList = Product::with('user')->get();
            return view('products.index', compact('productList'));
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

    // Retrieve user products (View)
    public function userProducts() {
        if(Auth::check()){
            $productList = Product::where('added_by', Auth::user()->id)->get();
            return view('products.user-products', compact('productList'));
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

    // Retrieve single product information (View)
    public function product($id) {
        $productInfo = Product::with('user')->where('id', $id)->first();
        return view('products.information', compact('productInfo'));
    }

    // Edit GET Method (View)
    public function editProduct($id) {
        if(Auth::check()){
            $productInfo = Product::where('id', $id)->first();
            return view('products.edit', compact('productInfo'));
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

}
