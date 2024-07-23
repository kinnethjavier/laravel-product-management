<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // Get all users (View)
    public function show() {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->role === 'Admin') {
                $userList = User::all();
                return view('users.index', compact('userList'));
            } else {
                return redirect('products');
            }
        }
  
        return redirect("login")->with('error', 'No credentials was found. Please sign in.');
    }

    // Update product management permission
    public function updatePM($id) {
        $user = User::findOrFail($id);
        $user->product_management = $user->product_management == 1 ? 0 : 1;
        $user->save();        

        return redirect("users");
    }

    // Update category management permission
    public function updateCM($id) {
        $user = User::findOrFail($id);
        $user->category_management = $user->category_management == 1 ? 0 : 1;
        $user->save();        

        return redirect("users");
    }

    // Delete account
    public function destroy($id) {
        User::destroy($id);

        return redirect('users');
    }
}
