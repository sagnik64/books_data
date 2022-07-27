<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class BorrowingController extends Controller
{
    public function borrowing_show() {
        $borrowing = Borrowing::all();

        if(!$borrowing->isEmpty()) {
            return response()->json([
                "success" => "true",
                "code" => 200,
                "message" => "Borrowing data found",
                "data" => $borrowing
            ],200);
        }
        else {
            return response()->json([
                "success" => "false",
                "code" => 400,
                "message" => "Borrowing data not found"
            ],400);
        }
    }

    public function borrowing_save(Request $request) {
        
        $borrowing = Borrowing::create($request->all());
        if($borrowing) {
            return response()->json([
                "success" => "true",
                "code" => 201,
                "message" => "Borrowing data saved successfully",
                "data" => $borrowing
            ],201);
        }
        else {
            return response()->json([
                "success" => "false",
                "code" => 400,
                "message" => "Failed to save borrowing data"
            ],400);
        }
    }

    public function show_borrowing_by_book_id(Request $request) {
        

        // return Book::find(1)->borrowings;

        $book = Book::find($request->id)->borrowings;

        if($book) {
            return response()->json([
                "success" => "true",
                "code" => 200,
                "message" => "Found borrowing data with Book ID = $request->id",
                "data" => $book
            ],200);            
        }

        else {
            return response()->json([
                "success" => "false",
                "code" => 404,
                "message" => "Failed to find borrowing data with Book ID = $request->id"
            ],404);
        } 

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
            return response()->json([
                "success" => "true",
                "code" => 200,
                "message" => "Found borrowing data with Book title matching with $title",
                "data" => $borrowing
            ],200); 
        }

        else {
            return response()->json([
                "success" => "false",
                "code" => 404,
                "message" => "Failed to find borrowing data with Book title matching with $title"
            ],404);
        }
    }
}
