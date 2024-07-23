<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class AuthController extends Controller
{
    // VIEWS

    // Login
    public function index()
    {
        if(Auth::check()){
            return redirect('products');
        }

        return view('auth.login');
    }  

    // Register
    public function register()
    {
        if(Auth::check()){
            return redirect('products');
        }

        return view('auth.register');
    }  

    // Add Product
    public function addProduct()
    {
        if(Auth::check()){
            return view('products.add');
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

    // POST REQUESTS
    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)) {
            return redirect()->intended('products');
        }

        return redirect("login")->with('error', 'Invalid credentials. Please make sure your email and password are correct.');
    }

    public function postRegister(Request $request)
    {  
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->with('success', 'User successfully created. Please sign in.');
    }

    public function create(array $data)
    {
      return User::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
}
