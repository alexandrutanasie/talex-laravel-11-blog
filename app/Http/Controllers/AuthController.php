<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){

        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validarea datelor introduse
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Încercarea autentificării
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirecționează utilizatorul autentificat
            return redirect()->intended('/admin/dashboard');
        }

        // Înapoi la formular cu eroare
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
