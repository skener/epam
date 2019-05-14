<?php

namespace src\index;

use app\DB;
use function core\view\view;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @return Response
 */
function books()
{
    $data = DB::getAllBooks();
    //var_dump($books);
    $books           = $data['books'];
    $number_of_pages = $data['number_of_pages'];

    return view(['default_layout.php', 'books/index.php'], compact(['books', 'number_of_pages']));
}

/**
 * @param $id
 *
 * @return Response
 */
function bookById($id)
{

    $book = DB::getBookById($id);

    return view(['default_layout.php', 'books/book_by_id.php'], compact('book'));
}

function find_query_book()
{
    $request   = Request::createFromGlobals();
    $queryBook = $request->get('q');
    if ( ! isset($queryBook) || empty($queryBook)) {
        throw new Exception('Please enter your search keyword');
    } else {
        $book  = filter_var($request->get('q'), FILTER_SANITIZE_STRING);
        $books = DB::find($book);

        return view(['default_layout.php', 'books/find_query_book.php'], compact('books'));
    }
}

function sortTags()
{
    echo 'sorting...';
    $request  = Request::createFromGlobals();
    $queryTag = $request->get('tagSort');
    if ( ! isset($queryTag) || empty($queryTag)) {
        echo books();
    } else {
        //$book  = $request->get('tagSort');
        $data            = DB::sortByTags($queryTag);
        $books           = $data['books'];
        $number_of_pages = $data['number_of_pages'];

        return view(['default_layout.php', 'books/sort_books.php'], compact(['books', 'number_of_pages']));
    }

}



function createBooks(){
$book  = \Book::find(1);
var_dump($book->tags->pluck('title')->toArray());
exit();


}





