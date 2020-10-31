<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;


class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::orderBy('created_at', 'asc')->paginate(5);
        return view('books',[
            'books' => $books
        ]);
    }

    public function update()
    {

    }
}
