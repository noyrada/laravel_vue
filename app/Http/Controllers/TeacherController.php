<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subjects')->get();
        return response()->json($teachers);
    }

    public function store(Request $request)
    {
       
        $teachers = new Teacher([
            'name'=>$request->input('name'),
            'gender'=> $request->input('gender'),
            'phone'=> $request->input('phone'),
            'salary'=> $request->input('salary'),
            'address'=>$request->input('address'),
        ]);
        $teachers->save();
        $teachers->subjects()->attach($request->subject);
        return response()->json('Teachers created!');
    }

    public function show(string $id)
    {
        $teachers = Teacher::with('subjects')->find($id);
        return response()->json($teachers);
    }

    public function update(Request $request, string $id)
    {
        $teachers = Teacher::find($id);
        $teachers->update([
            'name'=>$request->input('name'),
            'gender'=> $request->input('gender'),
            'phone'=> $request->input('phone'),
            'salary'=> $request->input('salary'),
            'address'=>$request->input('address'),
        ]);
        $teachers->subjects()->sync($request->subject);
        return response()->json('Updated successfully!');
    }
 
    public function destroy(string $id)
    {
        $teachers = Teacher::find($id);
        $teachers->delete();
        return response()->json("Teacher deleted!");
    }
}
