<?php

namespace App\Models;

use App\Kernel\EnumManager\ArtWorkTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtWorkCategory extends Model
{
    use HasFactory;
    public $table = 'artwork_category';
    public $fillable = [
        'title',
        'description',
        'type',
        'visible',
    ];
}
