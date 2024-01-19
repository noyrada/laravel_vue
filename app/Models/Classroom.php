<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    protected $fillable =[
        'name',
        'time'
    ];
    
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'classes__subjects', 'class_id', 'subject_id');
    }
}
