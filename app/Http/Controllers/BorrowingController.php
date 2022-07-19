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
        //     ->leftJoin('books','borrowings.book_id', '=', 'books.book_id')
        //     ->get();
        // return $borrowing;    
    }
}
