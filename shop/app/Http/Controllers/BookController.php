<?php

namespace App\Http\Controllers;

use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use App\Book;
use App\Tag;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::with('tags')->paginate(2);

        return view('books.books', compact('books'));

    }

    public function id($id)
    {

        $book = Book::find($id);



        return view('books.book', compact(['book', 'id']));
    }

    public function sort(Request $request)
    {
        $queryTag = $request->tagSort;

        $books = (array)DB::table('books')
                          ->join('book_tag', 'book_tag.book_id', '=', 'books.id')
                          ->join('tags', 'tags.id', '=', 'book_tag.tag_id')
                          ->where('tags.title', 'LIKE', '%' . $queryTag . '%')
                          ->get();

        $books=array_shift($books);
        return view('books.sort', compact('books'));

    }

    public function queryBook(Request $request)
    {
        $queryBook = $request->q;
        $books     = Book::whereRaw("MATCH (name,author) AGAINST ('" . $queryBook . "')")->with('tags')->paginate(2);

        return view('books.books', compact('books'));
    }
}
