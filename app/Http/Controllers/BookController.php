<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    //
    public function index()
    {
      // DBよりBookテーブルの値を全て取得
        $books = Book::all();

      // 取得した値をビュー「book/index」に渡す
        return view('book/index', compact('books'));
    }

    public function show($id)
    {
        return view('book', ['book' => Book::findOrFail($id)]);
    }

    public function edit($id)
    {
      // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $book = Book::findOrFail($id);

//        eval(\Psy\sh());
      // 取得した値をビュー「book/edit」に渡す
        return view('book/edit', compact('book'));
    }
    
    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect("/book");
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect("/book");
    }

    public function create()
    {
        // 空の$bookを渡す
        $book = new Book();
        return view('book/create', compact('book'));
    }

    public function store(BookRequest $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect("/book");
    }
}
