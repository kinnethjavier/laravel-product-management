<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show() {
        if(Auth::check()){
            $userList = User::all();
            return view('users.index', compact('userList'));
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }
}
