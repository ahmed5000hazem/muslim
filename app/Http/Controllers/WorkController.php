<?php

namespace App\Http\Controllers;

use App\Kernel\EnumManager\ArtWorkTypeEnum;
use App\Models\ArtWork;
use App\Models\User;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function getWorkByCategory($workCategory)
    {
        $artworks = ArtWork::query();
        foreach (ArtWorkTypeEnum::cases() as $case) {
            $workTypes[$case->name] = $case->value;
        }
        if ($workCategory == 0)
            $artworks = $artworks->paginate(25);
        else {
            $artworks = $artworks->where('type', $workCategory)->paginate(25);
        }

        $user = User::where('role', 'site-owner')->first();

        $home = $this->getHomePageData();

        return view('work-by-category', compact('workTypes', 'artworks', 'user', 'home'));
    }
}
