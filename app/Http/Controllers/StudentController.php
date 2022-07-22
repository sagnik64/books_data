<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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



    public function userLogin(Request $request) {

        $rules = array(
            "email"=>"required|email",
            "password"=>"required|min:4|max:20"
        );

        $isValid = Validator::make($request->all(),$rules);
        if($isValid->fails()) {
            return response()->json($isValid->errors(),401);
        }

        $data = $request->input();
        $request->session()->put('email',$data['email']);
        

        $student = Student::where('student_email','=', session('email'))
                    ->where('student_password','=',$request->password)->get();

        $list_of_books = Book::select('title as T', 'author as AR')
                                ->where('quantity', '>' , 0)->get();
        
        $request->session()->put('book_list', $list_of_books);
        
        // echo $list_of_books;
        // return;

        // echo $student[0]['first_name'];
        $student_first_name = $student[0]['first_name'];

        $request->session()->put('name', $student_first_name);

        $books_issued = DB::table('students')
            ->leftJoin('borrowings','students.id', '=', 'borrowings.student_id')
            ->leftJoin('books','borrowings.book_id','=','books.id')
            ->where('students.student_email','=', session('email'))
            ->select('books.title as B_T', 'books.author as AR', 'borrowings.date_borrowed as D_B', 'borrowings.date_return as D_R')
            // ->orderBy('books.title')
            ->get();

        // echo $books_issued;
        // return;
            
        $request->session()->put('issued_books', $books_issued);

        if(count($student)) {
            return redirect('profile');
        }
        return response()->json(["message" => "Wrong email or password"],401);
        
    }
}
