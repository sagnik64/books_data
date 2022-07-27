<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        if(!$book->isEmpty()) {
            return response()->json([
                "success" => "true",
                "code" => 200,
                "message" => "Book data found",
                "data" => $book
            ],200);
        }
        else {
            return response()->json([
                "status" => "fail",
                "code" => 400,
                "message" => "Book data not found"
            ],400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        if($book) {
            return response()->json([
                "success" => "true",
                "code" => 201,
                "message" => "Book data saved successfully",
                "data" => $book
            ],201);
        }
        else {
            return response()->json([
                "success" => "false",
                "code" => 400,
                "message" => "Failed to save book data"
            ],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $findBook = Book::find($book->id);
        if($findBook) {
            return response()->json([
                "success" => "true",
                "code" => 200,
                "message" => "Found book data with ID = $book->id",
                "data" => $findBook
            ],200);            
        }

        // TODO: Check why code is not going to the else block?
        else {
            return response()->json([
                "success" => "false",
                "code" => 404,
                "message" => "Failed to find book data with ID = $book->id"
            ],404);
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book = Book::find($book->id);
        $book->update($request->all());
        if($book) {
            return response()->json([
                "success" => "true",
                "code" => 200,
                "message" => "Book data with ID = $book->id updated successfully",
                "data" => $book
            ],200);  
        }
        else {
            return response()->json([
                "success" => "false",
                "code" => 404,
                "message" => "Failed to update book data with ID = $book->id"
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $bookFind = Book::find($book->id);
        $bookDelete = Book::destroy($book->id);
        if($bookDelete) {
            return response()->json([
                "success" => "true",
                "code" => 200,
                "message" => "Book data with ID = $book->id deleted successfully",
                "data" => $bookFind
            ],200);  
        }
        else {
            return response()->json([
                "success" => "false",
                "code" => 404,
                "message" => "Failed to delete book data with ID = $book->id"
            ],404);
        }
    }
}