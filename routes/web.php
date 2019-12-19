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
#home Route
Route::get('/', function () {
    return view('welcome');
});

#Category Route
Route::get('/category', 'CategoryController@category');
Route::post('/storecat', 'CategoryController@storecat');
Route::get('/delete/{id}', 'CategoryController@delete');

#Book Route
//admin route
Route::get('/viewbooks', 'BooksController@viewbook');
Route::get('/detail/{id}', 'BooksController@bookdetail');
Route::get('/addbook', 'BooksController@addbook');
Route::post('/storebook','BooksController@storebook');
Route::get('/editbook/{id}','BooksController@editbook');
Route::post('/updatebook/{id}', 'BooksController@updatebook');
Route::get('/deletebook/{id}', 'BooksController@deletebook');
//user route
Route::get('/bookstore','BooksController@bookstore');
Route::get('/bookstore/{id}', 'BooksController@showbookbycat');
Route::get('/detailofbook/{id}', 'BooksController@detail');


 
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
