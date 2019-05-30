<?php


Route::get('/', [
    'uses' => 'BookController@index',
    'as'   => 'books'
]);

Route::get('/book/{id}', [
    'uses' => 'BookController@id',
    'as'   => 'book.id'
]);
Route::get('/search', [
    'uses' => 'BookController@queryBook',
    'as'   => 'query.book'
]);

Route::get('/sort', [
    'uses' => 'BookController@sort',
    'as'   => 'sort'
]);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix'     => 'admin',
    'middleware' => ['auth','admin']
], function () {
    Route::get('dashboard', 'admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('create-book', 'admin\AdminController@create')->name('admin.book-form');
    Route::post('store-book', 'admin\AdminController@store')->name('admin.book-store');
    Route::get('delete-book/{id}', 'admin\AdminController@delete')->name('admin.book-delete');
    });