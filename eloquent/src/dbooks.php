<?php

namespace src\index;

use function core\view\view;
use Illuminate\Support\Facades\DB;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Builder;
use app\Book;
use app\Admin;

/**
 * @return Response
 */
function books()
{
    try {

        if ( ! isset($_GET['page'])) {

            $page = 1;

        } else {

            $page = $_GET['page'];

        }

        $perPage         = 2;

        $offset          = ($page - 1) * $perPage;

        $books           = Book::with('tags')->get()->forPage($page, $perPage)->toArray();

        $number_of_pages = count($books);

        return view(['default_layout.php', 'books/index.php'], compact(['books', 'number_of_pages']));

    } catch (PDOException $e) {

        echo $e->getMessage();

    }

}

/**
 * @param $id
 *
 * @return Response
 */

function bookById(int $id)
{
    $book = Book::find($id)->with('tags')->get()->first()->toArray();

    return view(['default_layout.php', 'books/book_by_id.php'], compact('book'));
}

function find_query_book()
{

    $request   = Request::createFromGlobals();

    $queryBook = $request->get('q');

    if ( ! isset($queryBook) || empty($queryBook)) {

        throw new Exception('Please enter your search keyword');

    } else {

        $queryBook = filter_var($request->get('q'), FILTER_SANITIZE_STRING);

        $books = Book::whereRaw("MATCH (name,author) AGAINST ('" . $queryBook . "')")->with('tags')->get()->toArray();

        return view(['default_layout.php', 'books/find_query_book.php'], compact('books'));
    }
}

function sortTags()

{
    echo 'sorting...';

    $request  = Request::createFromGlobals();

    $queryTag = $request->get('tagSort');

    echo 'sorting By..' . $queryTag;

    if ( ! isset($queryTag) || empty($queryTag)) {

        echo books();

    } else {

        $books = Book::with('tags')->get()->where('tags', 'LIKE', '%' . $queryTag . '%')->toArray();

        return view(['default_layout.php', 'books/sort_books.php'], compact(['books', 'number_of_pages']));
    }

}



function login()

{
    session_start();

    $request  = $request = Request::createFromGlobals();

    $email    = $request->get('email');

    $password = $request->get('password');

    $admin    = Admin::authenticate($email, $password);

    if ($admin) {

        $_SESSION ['user'] = 'Admin';

        $books             = Book::with('tags')->get();

        $number_of_pages = $books->count();

        return view(['default_layout.php', 'books/login.php'], compact('admin', 'number_of_pages', 'books'));

    } else {

        $_SESSION ['user'] = 'Guest';

        echo header('Location:http://app.eloquent/');

        exit();
    }
}





