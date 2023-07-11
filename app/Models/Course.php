<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function userCourse()
    {
        return $this->hasMany(userCourse::class, "id", "course_id");
    }
    public function courseSessions()
    {
        return $this->hasMany(courseSessions::class);
    }
}
