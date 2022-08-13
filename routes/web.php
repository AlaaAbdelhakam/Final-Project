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

Route::get('/','front\ArticlesController@index')->name('index');
Route::get('/article/{id}','front\ArticlesController@article')->name('article');
Route::get('/category/{id}','front\ArticlesController@category')->name('category');
Route::post('/comment/insert/{id}','front\ArticlesController@comment_insert')->name('comment');

Route::post('/search','front\ArticlesController@search')->name('search');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('admin')->prefix('home')->middleware('auth')->group(function () {
    Route::get('/category','CategoryController@index')->name('category.index');
    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::get('/category/trashed','CategoryController@trashed')->name('category.trashed');
    Route::post('/category/insert','CategoryController@insert')->name('category.insert');
    Route::get('/category/trash/{id}','CategoryController@trash')->name('category.trash');
    Route::get('/category/restore/{id}','CategoryController@restore')->name('category.restore');
    Route::get('/category/remove/{id}','CategoryController@remove')->name('category.remove');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}','CategoryController@update')->name('category.update');


    Route::get('/articles','ArticlesController@index')->name('articles.index');
    Route::get('/articles/create','ArticlesController@create')->name('articles.create');
    Route::get('/articles/trashed','ArticlesController@trashed')->name('articles.trashed');
    Route::post('/articles/insert','ArticlesController@insert')->name('articles.insert');
    Route::get('/articles/trash/{id}','ArticlesController@trash')->name('articles.trash');
    Route::get('/articles/restore/{id}','ArticlesController@restore')->name('articles.restore');
    Route::get('/articles/remove/{id}','ArticlesController@remove')->name('articles.remove');
    Route::get('/articles/edit/{id}','ArticlesController@edit')->name('articles.edit');
    Route::post('/articles/update/{id}','ArticlesController@update')->name('articles.update');

});
