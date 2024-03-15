<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware('api')->group(function (){
//     Route::resource('students', StudentController::class);
// });

Route::apiResource('/students',StudentController::class);
Route::apiResource('/classrooms',ClassroomController::class);
Route::get('/classrooms/{id}/teachers',[ClassroomController::class,'classSubject']);
Route::apiResource('/teachers',TeacherController::class);
Route::apiResource('/subjects',SubjectController::class);
