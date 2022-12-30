<?php

namespace App\Http\Controllers;

use App\Kernel\EnumManager\ArtWorkTypeEnum;
use App\Models\ArtWork;
use App\Models\ArtWorkCategory;
use App\Models\HomePage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function getHomePageData()
    {
        $home = Cache::remember('home-data', 60 , function () {
            return HomePage::all();
        });
        foreach ($home as $rec) $data[$rec->key] = $rec->value;
        $home = $data;

        return $home;
    }

    public function index()
    {
        $user = User::where('role', 'site-owner')->first();
        $artWorkCategories = ArtWorkCategory::all();
        $artworks = ArtWork::where('featured', 1)->get();
        $home = $this->getHomePageData();
        foreach (ArtWorkTypeEnum::cases() as $case) {
            $counts[$case->name] = ArtWork::where('type', $case->name)->count();
            $workTypes[$case->name] = $case->value;
        }

        $counterIcons = [
            'bi-display',
            'bi-music-note-list',
            'bi-play-btn',
            'bi-award'
        ];
        
        return view('home', compact(
            'user', 
            'home', 
            'artWorkCategories', 
            'artworks', 
            'workTypes',
            'counts',
            'counterIcons',
        ));
    }

    public function getInTouch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            session()->flash('send-message-response', [
                    'messages' => $errors->all(),
                    'status' => 0
                ]);
            return redirect()->back();
        }

        Message::create($request->all());
        session()->flash(
            'send-message-response', [
                'messages' => ['Message send successfully'],
                'status' => 1,
            ]);
        return redirect()->back();
    }
}
