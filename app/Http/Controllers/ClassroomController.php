<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::with('subjects')->get();
        return response()->json($classrooms);
    }
    public function getStudent()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $classrooms = new Classroom([
            'name' => $request->input('name'),
            'time' => $request->input('time')
        ]);
        $classrooms->save();
        $classrooms->subjects()->attach([
            $request->project1,
            $request->project2,
            $request->project3,
        ]);
        return response()->json('classroom created!');
    }

    public function show(string $id)
    {
        $classrooms = Classroom::with('subjects')->find($id);
        return response()->json($classrooms);
    }

    public function update(Request $request, string $id)
    {
        $classrooms = Classroom::find($id);
        $classrooms->update($request->all());
        return response()->json('Updated successfully!');
    }

    public function destroy(string $id)
    {
        $classrooms = Classroom::find($id);
        $classrooms->delete();
        return response()->json("Class deleted!");
    }
    public function classSubject($id)
    {
        $subjects = Subject::find($id)->teachers()->get();
        return response()->json($subjects);
    }
}
