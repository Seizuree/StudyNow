<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSession extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class, "session_id", "session_id");
    }
}
