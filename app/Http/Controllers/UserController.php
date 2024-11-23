<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function changePassword(){
        return view('admin.user.change-password');
    }

    public function updatePassword(Request $request){
    $request->validate([
        'new_password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    $user = Auth::user();

    // Update the password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('success', 'Password updated successfully!');
    }
}
