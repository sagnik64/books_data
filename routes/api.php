<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/book',BookController::class)->middleware('protected_page');

// Route::view('user','user')->middleware('protected_page');

Route::view('no_access','no_access');


Route::get('/borrowing_show', [BorrowingController::class, 'borrowing_show']);
Route::post('/borrowing_save', [BorrowingController::class, 'borrowing_save']);

Route::get('/find_all_borrowings_by_book_id/{id}', [BorrowingController::class, 'show_borrowing_by_book_id']);