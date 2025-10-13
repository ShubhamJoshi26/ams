<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Tutor extends Model
{
  protected $fillable = [
    'name',
    'designation',
    'experience',
    'bio',
    'image',
    'status',
    'course_id',
  ];
 public function course()
{
    return $this->belongsTo(Course::class);
}
public function category()
{
    return $this->hasOneThrough(
        Category::class,
        Course::class,
        'id',           // Foreign key on Course table
        'id',           // Foreign key on Category table
        'course_id',    // Local key on Tutor table
        'category_id'   // Local key on Course table
    );
}
}
