<?php

namespace app;
$app = [
    'name' => 'Book Store',

    'routes' => [
        'books' => [
            'path' => '/',
            'file' => 'dbooks.php',
            'function' => 'src\\index\\books',
        ],
        'sort_books' => [
            'path' => '/sort',
            'file' => 'dbooks.php',
            'function' => 'src\\index\\sortTags',
        ],
        'book_by_id' => [
            'path' => '/book/{id}.html',
            'file' => 'dbooks.php',
            'function' => 'src\\index\\bookById',
        ], 'find_query_book' => [
            'path' => '/query',
            'file' => 'dbooks.php',
            'function' => 'src\\index\\find_query_book',
        ],'test' => [
            'path' => '/test',
            'file' => 'dbooks.php',
            'function' => 'src\\index\\createBooks',
        ],
    ],
];



require "../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;



$capsule = new Capsule;



$capsule->addConnection([

    "driver" => "mysql",

    "host" =>"127.0.0.1",

    "database" => "",

    "username" => "",

    "password" => ""

]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();

