<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'site-owner')->first();
        return view('home', compact('user'));
    }
}
