<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Classroom;

class Subject extends Model
{
    use HasFactory;
    protected $fillable =[
        'name'
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teachers__subjects', 'subject_id', 'teacher_id');
    }
    public function classroom(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'classes__subjects', 'subject_id', 'class_id');
    }
}
