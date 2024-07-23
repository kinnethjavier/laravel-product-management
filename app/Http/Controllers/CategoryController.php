<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    // Add categories (View)
    public function addCategory()
    {
        if(Auth::check()){
            return view('categories.add');
        }
    
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

    // Create POST Method
    public function store(Request $request) {
        $request->validate([
            'category' => 'required',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return redirect("categories");
    }

    public function create(array $data)
    {
      return Category::create([
        'added_by' => Auth::user()->id,
        'category' => $data['category'],
        'description' => $data['description'],
      ]);
    }

     // Retrieve all categories (View)
     public function show() {
        if(Auth::check()){
            $categoryList = Category::with('user')->get();
            return view('categories.index', compact('categoryList'));
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }
}
