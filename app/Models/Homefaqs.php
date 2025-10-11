<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homefaqs extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'status',
    ];
}
