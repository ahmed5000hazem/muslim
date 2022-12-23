<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'site-owner')->first();
        $data = [];
        $home = HomePage::all();
        foreach ($home as $rec) $data[$rec->key] = $rec->value;
        $home = $data;
        // dd($home);
        return view('home', compact('user', 'home'));
    }
}
