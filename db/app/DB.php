<?php

namespace app;

use PDO;
use Symfony\Component\HttpFoundation\Request;

class DB
{

    protected static $pdo;

    public static function getAllBooks()
    {


        try {


            if ( ! isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $per_page        = 2;
            $offset          = ($page - 1) * $per_page;
            $sql             = "SELECT
      b.id,
       b.poster,
       b.name,
       b.author,
       b.price,
       b.date,
       t.title
FROM books b
INNER JOIN books_tags bt
ON b.id=bt.book_id
INNER JOIN tags t
ON t.id=bt.tag_id
LIMIT $per_page OFFSET  $offset";
            $pdo             = self::connect();
            $stmt            = $pdo->query($sql);
            $books           = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $totalBooks      = $pdo->query('SELECT * FROM books')->rowCount();
            $number_of_pages = ceil($totalBooks / $per_page);
            $data            = ['books' => $books, 'number_of_pages' => $number_of_pages];

            return $data;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $pdo = null;
    }


    public static function getBookById($id)
    {
        try {
            $sql  = 'SELECT
       books.id,
       books.poster,
       books.name,
       books.author,
       books.price,
       books.date
FROM books
WHERE books.id = :id';
            $pdo  = self::connect();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();

            return $result;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $pdo = null;
    }


    public static function connect()
    {
        static $pdo = null;
        require '../assets/config.php';
        if ($pdo === null) {
            try {
                $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
                $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $pdo;
    }


    public static function find($search)
    {

        try {
            $pdo  = self::connect();
            $sql  = 'SELECT
                   b.id,
                   b.poster,
                   b.name,
                   b.author,
                   b.price,
                   b.date
            FROM books b WHERE
            Match(b.name,b.author) Against  (:search)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':search', $search);
            $stmt->execute();

            return $books = $stmt->fetchAll();


        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }


    public static function sortByTags(string $tag)
    {

        try {
            if ( ! isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $per_page        = 2;
            $offset          = ($page - 1) * $per_page;
            $sql             = "SELECT
                   b.id,
                   b.poster,
                   b.name,
                   b.author,
                   b.price,
                   b.date,
                   t.title
            FROM books b
            INNER JOIN books_tags bt
            ON b.id=bt.book_id
            INNER JOIN tags t
            ON t.id=bt.tag_id
            WHERE t.title LIKE '%$tag%'
            LIMIT $per_page OFFSET  $offset";
            $pdo             = self::connect();
            $stmt            = $pdo->query($sql);
            $books           = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $totalBooks      = $pdo->query('SELECT * FROM books')->rowCount();
            $number_of_pages = ceil($totalBooks / $per_page);
            $data            = ['books' => $books, 'number_of_pages' => $number_of_pages];

            //var_dump($data);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage('No such  tag in books');
        }

    }


}


