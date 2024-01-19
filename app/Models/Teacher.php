<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'salary',
        'address'
        
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teachers__subjects', 'teacher_id', 'subject_id');
    }
}
