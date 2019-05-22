<?php

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

Route::get('/', function () {
    return view('default');
});

Route::get ( '/', [
    'uses' => 'BookController@index',
    'as'   => 'books'
] );

Route::get ( '/book/{id}', [
    'uses' => 'BookController@id',
    'as'   => 'book.id'
] );
Route::get ( '/search', [
    'uses' => 'BookController@queryBook',
    'as'   => 'query.book'
] );

Route::get ( '/sort', [
    'uses' => 'BookController@sort',
    'as'   => 'sort'
] );

Route::group([
    'middleware' => ['web', 'auth', 'role:admin'],
    'prefix'     => 'admin',
    'as'         => 'admin.',
], function () {

    Route::resource('product', 'Admin\ProductController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
