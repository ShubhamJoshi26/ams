<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Students extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = 'students';

    protected $guard = 'student';

    protected $fillable = [
        'name',
        'email',
        'dob',
        'mobile',
        'fathers_name',
        'mothers_name',
        'address',
        'state',
        'district',
        'city',
        'pincode',
        'country',
        'heighest_qualification',
        'status',
        'image',
        'signature',
        'added_by',
        'device_token',
        'mobile_id',
        'session_id',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
    
    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class, 'student_id')->with('course');
    }


    /**
     * Define relationship: A student has many progress records.
     */
    public function progress()
    {
        return $this->hasMany(StudentProgress::class, 'student_id');
    }




    /**
     * Define relationship: A student has many news.
     */
    public function readNews()
    {
        return $this->belongsToMany(NewsUpdate::class, 'news_reads')
            ->withPivot('read_at');
    }
}
