<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_new',
        'short_description',
        'description',
        'type',
        'media_path',
        'embed_link',
        'status',
        'slug'
    ];
}
