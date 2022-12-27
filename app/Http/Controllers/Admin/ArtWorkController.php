<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtWorkController extends Controller
{
    public function index()
    {
        return view('admin.artwork.index');
    }

    public function create()
    {
        return view('admin.artwork.create');
    }
}
