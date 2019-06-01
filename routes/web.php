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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::get('p/get_by_club/{id}', 'PostsController@get_by_club')->name('posts.get_by_club');

Route::get('/', function() {
    return view('welcome');
})->middleware('guest')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('favorite/', 'FavoritesController@index');
Route::post('favorite/{post}', 'FavoritesController@store');

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/search', 'PostsController@search');

Route::get('/p/{post}/edit', 'PostsController@edit')->name('posts.edit');
Route::get('/p/{post}', 'PostsController@show')->name('posts.show');
Route::patch('/p/{post}', 'PostsController@update')->name('posts.update');
Route::delete('/p/{post}', 'PostsController@destroy')->name('posts.delete');


Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/clubs/', 'ClubsController@index')->name('clubs.index');


