<?php

namespace App\Http\Controllers;

use App\Models\Avatar;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'total_count' => Avatar::all()->count(),
        ]);
    }
}
