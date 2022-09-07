<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCourse extends Model
{
    protected $table = 'my_courses';

    protected $fillable = [
        'course_id', 'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
