<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\Book;
use App\Http\Controllers\CookieController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Route::view('profile','profile');


Route::get('login', function () {
    if(session()->has('email')) {
        return redirect('profile');
    }
    return view('login');
});

Route::get('logout', function () {
    if(session()->has('email') && session()->has('issued_books')) {
        session()->pull('email');
        session()->pull('issued_books');
    }
    return redirect('login');
});


Route::get('book_list', function () {
    
    $bookList = Book::select('title as T', 'author as AR')
                ->where('quantity', '>' , 0)->paginate(5);
    return view('book_list',['book_list_data' => $bookList ]);
});

Route::post('user_login',[StudentController::class,'userLogin']);

Route::get('/cookie/set',[CookieController::class,'setCookie']);
Route::get('/cookie/get',[CookieController::class,'getCookie']);