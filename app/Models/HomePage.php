<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    public $table = "home_page";

    public $fillable = ["key", "value"];

    public $timestamps = false;
}
