<?php

namespace App\Http\Controllers;

use App\Kernel\EnumManager\ArtWorkTypeEnum;
use Illuminate\Http\Request;

class ArtWorkCategoryController extends Controller
{

    public function index()
    {
        foreach(ArtWorkTypeEnum::cases() as $case) 
            $cases[$case->name] = $case->value;
        return view('admin.artwork-category.index', compact('cases'));
    }
}
