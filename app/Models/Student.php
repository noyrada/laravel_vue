<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ClassroomController;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable=[
        'name',
        'gender',
        'address'
    ];
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'class_id', 'id');
    }
}
