<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::with('teachers')->get();
        return response()->json($subjects);
    }

    public function store(Request $request)
    {
        $subjects = new Subject([
            'name'=>$request->input('name')
        ]);
        $subjects->save();
        return response()->json('Sujcet created!');
    }

    public function show(string $id)
    {
        $subjects = Subject::with('teachers')->find($id);
        return response()->json($subjects);

    }

    public function update(Request $request, string $id)
    {
        $subjects = Subject::find($id);
        $subjects->update([
            'name'=>$request->input('name')
        ]);
        return response()->json('Sujcet Updated!');
    }

    public function destroy(string $id)
    {
        
    }
}
