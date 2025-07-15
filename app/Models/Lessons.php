<?php
namespace App\Models;

use App\Models\Videos;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'content',
    ];


    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function videos()
    {
        return $this->hasMany(Videos::class, 'lesson_id'); 
    }
    
}
