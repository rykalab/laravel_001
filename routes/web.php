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
    return view('welcome');
});

Route::get('/401', function () {
    return view('401');
})->name('401');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    [
        'middleware' => 'acl',
        'roles' => 'ADMIN'
], function () {

Route::get('/categories','CategoriesController@index')
    ->name('categories.index');

Route::get('/categories/create','CategoriesController@create')
    ->name('categories.create');

Route::post('/categories','CategoriesController@store')
    ->name('categories.store');

Route::get('/categories/{category}/edit','CategoriesController@edit')
    ->name('categories.edit');

Route::put('/categories/{category}','CategoriesController@update')
    ->name('categories.update');

Route::delete('/categories/{category}','CategoriesController@destroy')
    ->name('categories.destroy');
Route::resource('articles', 'ArticlesController');
Route::resource('users', 'UsersController');
Route::resource('comments', 'CommentsController');
Route::resource('files', 'FilesController');
Route::resource('roles', 'RolesController');
});
Route::group(
    [
        'middleware' => 'acl',
        'roles' => ['MOD','ADMIN']
], function () {

Route::get('/categories','CategoriesController@index')
    ->name('categories.index');

Route::get('/categories/create','CategoriesController@create')
    ->name('categories.create');

Route::post('/categories','CategoriesController@store')
    ->name('categories.store');

Route::get('/categories/{category}/edit','CategoriesController@edit')
    ->name('categories.edit');

Route::put('/categories/{category}','CategoriesController@update')
    ->name('categories.update');

Route::delete('/categories/{category}','CategoriesController@destroy')
    ->name('categories.destroy');
Route::resource('articles', 'ArticlesController');
Route::resource('users', 'UsersController');
Route::resource('comments', 'CommentsController');
Route::resource('files', 'FilesController');
Route::resource('roles', 'RolesController');
});
