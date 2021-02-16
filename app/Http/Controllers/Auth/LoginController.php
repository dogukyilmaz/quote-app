<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validate
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);


        // sign in user
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid credentials.');
        }

        // redirect
        return redirect()->route('dashboard');
    }
}
