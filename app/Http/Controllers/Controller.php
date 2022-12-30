<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getHomePageData()
    {
        $home = Cache::remember('home-data', 60 , function () {
            return HomePage::all();
        });
        foreach ($home as $rec) $data[$rec->key] = $rec->value;
        $home = $data;

        return $home;
    }
}
