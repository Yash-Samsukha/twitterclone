<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate(
            [   'name' => 'required|min:3|max:40',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed'
            ]);

        User::create(
            [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
            ]
        );
        return redirect()->route('dashboard')->with('success', 'Account created Successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function Authenticate()
    {
        $validated = request()->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );
        if (auth()->attempt($validated)){
            request()->session()->regenerate();
             return redirect()->route('dashboard')->with('success', 'Login Successfully!');
        }
            return redirect()->route('login')->withErrors([
              'email'=>"No match found with the given email & password"]
            );
    }
    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success','Logout Successfully');

    }
}
