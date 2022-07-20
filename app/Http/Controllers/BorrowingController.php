<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class BorrowingController extends Controller
{
    public function borrowing_show() {
        return Borrowing::all();
    }

    public function borrowing_save(Request $request) {
        
        $borrowing = Borrowing::create($request->all());
        if($borrowing) {
            return ["result" => "data saved successfully"];
        }
        else {
            return ["result" => "failed to save data"];
        }
    }

    public function show_borrowing_by_book_id(Request $request) {
        
        // return "hello";

        // return Book::find(1)->borrowings;

        return Book::find($request->id)->borrowings;

        // return Book::where('book_id', 1);

        // return Book::where('book_id','=',$borrowing->book_id);


        // $borrowing = DB::table('borrowings')
        //     ->leftJoin('books','borrowings.book_id', '=', 'books.id')
        //     ->get();
        // return $borrowing;    
    }

    public function borrowings_by_book_title($title) {

        $borrowing = DB::table('borrowings')
            ->leftJoin('books','borrowings.book_id', '=', 'books.id')
            ->leftJoin('students','borrowings.student_id','=','students.id')
            ->where("books.title","like",$title."%")
            ->select('borrowings.id', 'borrowings.book_id', 'borrowings.student_id',
                    'borrowings.date_borrowed', 'borrowings.date_return',
                    'books.title','students.first_name','students.last_name')
            ->orderBy('books.title')
            ->get();
        
        if(count($borrowing)) {
            return $borrowing;
        }
        else {
            return response()->json([
                'result' => 'no records found'
            ]);
        }
    }
}
