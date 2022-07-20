<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Student;

class StudentController extends Controller
{
    public function student_get() {
        return Student::all();
    }

    public function student_post(Request $request) {
        
        $student = Student::create($request->all());
        if($student) {
            return response()->json([
                "result" => "Student data saved successfully"
            ]);
        }
        else {
            return response()->json([
                'result' => 'Failed to save data'
            ],401);
        }
    }
}
