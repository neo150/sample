<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Place;
use Validator;
use Auth;


class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $books = Book::orderBy('created_at', 'desc')->paginate(4);
        $getPlaces = Place::all()->pluck('name','id');
        $books = Book::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('books',[
            'books' => $books,
            'getPlaces' => $getPlaces,         
            ]);
    }

    public function store(Request $request){
        // バリデーション
        $validator = Validator::make($request->all(),[
            'item_name' => 'required|max:255',
            'item_number' => 'required | min:1 | max:3',
            'item_amount' => 'required | max:6',
            'published' => 'required',
        ]);
    
        if($validator->fails()){
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }
        // file取得
        $file = $request->file('item_img');
        // fileが空かチェック
        if(!empty($file)){
            // ファイル名を取得
            $filename = $file->getClientOriginalName();
            // ファイル名を保存
            $move = $file->move('./upload/',$filename);
        }else{
            $filename = "";
        }
    
        $books = new Book;
        $books->user_id = Auth::user()->id;
        $books->place_id = $request->place_id;
        $books->item_name = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->item_img = $filename;
        $books->published = $request->published;
        $books->save();
        return redirect('/');
    }

    public function update(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'item_name' => 'required|max:255',

        ]);

        if($validator->fails()){
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }

        $books = Book::where('user_id',Auth::user()->id)->find($request->id);
        $books->item_name = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published = $request->published;
        $books->save();
        return redirect('/');
    }

    public function edit($book_id){
        $books = Book::where('user_id', Auth::user()->id)->find($book_id);
        return view('booksedit',[
            'book' => $books
        ]);
    }

    public function destory(Book $book){
        $book->delete();
        return redirect('/');
    }
}
