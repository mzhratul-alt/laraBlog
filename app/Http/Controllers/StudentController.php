<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentIndex()
    {
        return view('student.studentCreate');
    }

    public function studentStore(Request $request)
    {
        $validatePost = $request->validate([
            'stdName' => 'required|max:125|min:3',
            'stdEmail' => 'required|unique:students,email',
            'stdPhone' => 'required|unique:students,phone|max:14|min:11',
        ]);

        $student = new Student;

        $student->name = $request->stdName;
        $student->email = $request->stdEmail;
        $student->phone = $request->stdPhone;

        $student->save();

        if ($student) {
            return back()->with([
                'message' => 'Student Inserted Successfully',
                'alert-type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Post does not insert.',
                'alert-type' => 'error',
            ]);
        }
    }
}
