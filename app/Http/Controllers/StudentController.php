<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('classroom')->get();
        return response()->json($students);
    }
    public function getClassroom()
    {
        $classrooms = Classroom::all();
        return response()->json($classrooms);
    }

    public function store(Request $request)
    {
        $students = new Student([
            'name'=>$request->input('name'),
            'gender'=> $request->input('gender'),
            'address'=>$request->input('address'),
            'class_id'=>$request->input('class'),
        ]);
        $students->save();
        $students->classrooms()->attach($request->class_id);
        return response()->json('Student created!');
    }

    public function show(string $id)
    {
        $students = Student::with('classroom')->find($id);
        return response()->json($students);
    }

    public function update(Request $request, string $id)
    {
        $students = Student::find($id);
        $students->update($request->all());
        return response()->json('Student updated!');
    }
    
    public function destroy(string $id)
    {
        
    }
}
