<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'name',
        'badge_icon',
        'issued_date',
        'certificate_id',
        'status',
    ];
}
