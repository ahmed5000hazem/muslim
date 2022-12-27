<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtWork extends Model
{
    use HasFactory;
    public $table = 'art_works';

    public $fillable = [
        'title',
        'description',
        'work_link',
        'image',
        'type',
        'published_at',
    ];
}
