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

    // Edit GET Method (View)
    public function editCategory($id) {
        if(Auth::check()){            
            $categoryInfo = Category::where('id', $id)->first();
            return view('categories.edit', compact('categoryInfo'));
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

    // Update category
    public function update(Request $request, $id) {
        $request->validate([
            'category' => 'required',
        ]);

        $data = $request->all();

        $category = Category::findOrFail($id);

        $category->update([
            'category' => $data['category'],
            'description' => $data['description'],
        ]);

        return redirect("categories");
    }

    // Delete category
    public function destroy($id) {
        Category::destroy($id);

        return redirect('categories');
    }
}
