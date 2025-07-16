<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'instructor_id',
        'category_id',
        'title',
        'description',
        'price',
        'image'
    ];

    public function lessons()
    {
        return $this->hasMany(Lessons::class, 'course_id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }


}
