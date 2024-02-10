<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'total_count' => Avatar::count(),
            'total_requests' => Request::count(),
        ]);
    }
}
