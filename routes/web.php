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
Route::get('/admin/posts', 'AdminController@posts')->name('admin.posts');
Route::get('/admin/clubs', 'AdminController@clubs')->name('admin.clubs');
Route::get('/admin/profiles', 'AdminController@profiles')->name('admin.profiles');
Route::get('/admin/users', 'AdminController@users')->name('admin.users');

Route::patch('/admin/users/user/{user}', 'AdminController@usersroleuser')->name('admin.role.user');
Route::patch('/admin/users/trainer/{user}', 'AdminController@usersroletrainer')->name('admin.role.trainer');
Route::patch('/admin/users/admin/{user}', 'AdminController@usersroleadmin')->name('admin.role.admin');

Route::get('favorite/', 'FavoritesController@index');
Route::post('favorite/{post}', 'FavoritesController@store');

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/search', 'PostsController@search');

Route::get('/p/{post}/edit', 'PostsController@edit')->name('posts.edit');
Route::get('/p/{post}', 'PostsController@show')->name('posts.show');
Route::patch('/p/{post}/accept', 'PostsController@acceptPost')->name('posts.accept');
Route::patch('/p/{post}', 'PostsController@update')->name('posts.update');
Route::delete('/p/{post}', 'PostsController@destroy')->name('posts.delete');


Route::get('/clubs/create', 'ClubsController@create')->name('clubs.create');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/mvp', 'ProfilesController@mvp')->name('profile.mvp');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/clubs/{club}/edit', 'ClubsController@edit')->name('clubs.edit');
Route::patch('/clubs/{club}', 'ClubsController@update')->name('clubs.update');
Route::patch('/clubs/transfer/{club}', 'ClubsController@addtransfer')->name('clubs.add.transfer')->middleware('auth');
Route::patch('/clubs/transfer/accept/{profile}', 'AdminController@accepttransfer')->name('admin.accept.transfer');
Route::patch('/clubs/transfer/decline/{profile}', 'AdminController@declinetransfer')->name('admin.decline.transfer');
Route::get('/clubs/{club}', 'ClubsController@show')->name('clubs.show');
Route::get('/clubs/', 'ClubsController@index')->name('clubs.index');
Route::post('/clubs', 'ClubsController@store')->name('clubs.store');
Route::delete('/clubs/{club}', 'ClubsController@destroy')->name('clubs.delete');


