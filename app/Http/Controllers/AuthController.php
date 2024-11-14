<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect('/admin')->with('success', 'Login successful !!!');
        }
        
        return redirect()->back()->with('error', 'Wrong email or password !!!');
    }
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
