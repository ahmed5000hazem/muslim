<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArtWork;
use Illuminate\Http\Request;

class ArtWorkController extends Controller
{
    
    public function mount()
    {
        dd($this->artWork);
    }

    public function index()
    {
        return view('admin.artwork.index');
    }

    public function edit($work)
    {
        $work = ArtWork::where('id', $work)->first()->toArray();
        return view('admin.artwork.edit', compact('work'));
    }

    public function create()
    {
        return view('admin.artwork.create');
    }
}
