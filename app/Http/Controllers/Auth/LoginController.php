<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // validate user input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // sign in the user
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid email or password');
        }

        // redirect the user
        return redirect()->route('dashboard');
    }
}
