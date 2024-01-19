<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes_Subjects extends Model
{
    protected $table= "classes__subjects";
    protected $fillable = [
        'class_id',
        'subject_id'
    ];
}
