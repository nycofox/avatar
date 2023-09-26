<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        if (!auth()->attempt($request->only('email', 'password'), true)) {
            return back()->with('error', 'Invalid login details');
        }

        return redirect()->route('avatar.index');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
