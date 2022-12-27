<?php

namespace App\Kernel\EnumManager;

enum ArtWorkTypeEnum:string {
    case Intro = 'movie / series intro';
    case Music = 'audio music';
    case Clip = 'clip';
    case TVShow = 'tv shows';
}