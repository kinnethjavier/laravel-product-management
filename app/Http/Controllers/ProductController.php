<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Add product (View)
    public function addProduct()
    {
        if(Auth::check()){
            $categoryList = Category::all();
            return view('products.add', compact('categoryList'));
        }
    
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

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

        return redirect("products/own");
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
        $productList = Product::with('user')->get();
        return view('products.index', compact('productList'));
    }

    // Retrieve user products (View)
    public function userProducts() {
        if(Auth::check()){
            $productList = Product::where('added_by', Auth::user()->id)->get();
            return view('products.own', compact('productList'));
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
            $categoryList = Category::all();
            $categoryList->prepend(new Category(['category' => 'Other'])); // add default value of category

            return view('products.edit', compact('productInfo', 'categoryList'));
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

    // Update product
    public function update(Request $request, $id) {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required',
        ]);

        $data = $request->all();

        $product = Product::findOrFail($id);

        // upload new photo if changed
        if ($request->hasFile('photo')) {
            // delete old photo
            if ($product->photo && file_exists(public_path('images/products/' . $product->photo))) {
                unlink(public_path('images/products/' . $product->photo));
            }

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('images/products'), $fileName);
            $data['photo'] = $fileName;
        } else {
            // retain old photo
            $data['photo'] = $product->photo;
        }

        $product->update([
            'product_name' => $data['product_name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'photo' => $data['photo'],
            'category' => $data['category'],
            'specification' => $data['specification'] ?? NULL,
            'color' => $data['color'] ?? NULL,
            'size' => $data['size'] ?? NULL,
        ]);

        return redirect("products/info/{$id}");
    }

    // Delete product
    public function destroy($id) {
        Product::destroy($id);

        return redirect('products/own');
    }
}
