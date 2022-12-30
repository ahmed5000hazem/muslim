<?php

namespace App\Kernel\EnumManager;

enum ArtWorkTypeEnum:string {
    case Intro = 'Movie / Series Intro';
    case Music = 'Audio Music';
    case Clip = 'Clip';
    case TVShow = 'Tv Shows';
}