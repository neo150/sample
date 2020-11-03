<?php

use App\Book;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     $books = Book::orderBy('created_at', 'asc')->get();
//     return view('books',[
//         'books' => $books
//     ]);
// });

// 場所表示
Route::get('/places', 'PlacesController@index');

// 本ダッシュボード表示
Route::get('/', 'BooksController@index');

// 新本追加
Route::post('/books', 'BooksController@store');

// 本削除
Route::delete('/book/{book}', 'BooksController@destory');

// 更新処理
Route::post('books/update', 'BooksController@update');

// 更新画面
Route::post('/booksedit/{books}', 'BooksController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

