<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validate user input
        $validated = $request->validate([
            'name' => 'required|max:225',
            'username' => 'required|max:225|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        // store user input
        User::create($validated);

        // sign in the user
        auth()->attempt($request->only('email', 'password'));

        // redirect the user
        return redirect()->route('dashboard');
    }
}
