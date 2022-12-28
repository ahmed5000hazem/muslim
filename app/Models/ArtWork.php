<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ArtWork extends Model
{
    use HasFactory, Searchable;
    public $table = 'art_works';

    public $fillable = [
        'title',
        'description',
        'work_link',
        'image',
        'type',
        'published_at',
    ];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }
}
