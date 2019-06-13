<?php

namespace App\Http\Controllers\admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CreateBooksFormRequest;

class AdminController extends Controller
{

    public function dashboard()
    {
        $books = Book::with('tags')->get();

        return view('admin.dashboard', compact('books'));
    }

    public function create(CreateBooksFormRequest $request)
    {
        $tags = Tag::all();

        return view('admin.book-form', compact('tags'));

    }

    public function edit($id)
    {
        $book = Book::find($id);

        return view('admin.book.edit')->with('book', $book)->with('tags', Tag::all());
    }

    public function store(Request $request)
    {
        $books = Book::create([
            'poster' => $request->poster,
            'name'   => $request->name,
            'author' => $request->author,
            'price'  => $request->price,
            'date'   => $request->date

        ]);

        return redirect()->route('admin.dashboard');
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.dashboard');
    }

}