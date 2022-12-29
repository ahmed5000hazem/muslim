<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Message extends Model
{
    use HasFactory, Searchable;

    public $fillable = ['name', 'email', 'subject', 'message'];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'read_at' => $this->read_at,
        ];
    }
}
