<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }

    public function show(Message $message)
    {
        return view('admin.contact.show', compact('message'));
    }
}
