<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return redirect(route('home'));
});

Route::get('/home', function ()
{
    return view('welcome');
})->name('home');

Route::prefix('browse')->name('browse.')->middleware(['auth'])->group(function ()
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('movies', ['uses' => 'HomeController@movies'])->name('movies');
    Route::get('series', ['uses' => 'HomeController@series'])->name('series');
    Route::get('latest', ['uses' => 'HomeController@latest'])->name('latest');
    Route::get('legal/{type}', ['uses' => 'HomeController@legal'])->name('legal');
    Route::get('m/{id}', ['uses' => 'HomeController@show'])->name('show_movie')->middleware('check-subscription');
    Route::get('movie-genre/{genre}', ['uses' => 'HomeController@movie_genres'])->name('movie_genres');
    Route::get('movie-cast/{cast}', ['uses' => 'HomeController@movie_casts'])->name('movie_casts');
    Route::any('/search', 'HomeController@search')->name('search');
});

Route::namespace('Admin')->prefix('user')->name('admin.user.')->middleware(['auth'])->group(function ()
{
    Route::get('yourprofile', 'UserController@updateprofile')->name('updateprofile');
    Route::put('{user}', 'UserController@update')->name('update');
    Route::put('changepassword/{user}', 'UserController@change_password')->name('changepassword');
});

// Admin Dashboard
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'role:admin|super_admin'])->group(function ()
{

    Route::resource('/', 'AdminController')->only(['index']);
    Route::resource('users', 'UserController');
    Route::resource('permission', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('movies', 'MovieController');
    Route::resource('series', 'SerieController');
    Route::resource('genres', 'GenreController');
    Route::resource('casts', 'CastController');

    Route::get('editprofile', 'AdminController@edit')->name('edit');

    Route::put('update_role/{user}', 'UserController@update_role')->name('users.update_role');

    Route::get('userslogs', 'UserController@users_logs')->name('users.userslogs');
    Route::delete('userslogs/{logs}', 'UserController@destroy_users_logs')->name('users.destroy_users_logs');

    Route::get('pages', 'AdminController@pages')->name('pages.index');
    Route::put('pages/{page}', 'AdminController@page')->name('pages.page');
});

// Subscription payment page
Route::get('payment', 'PaymentController@payment')->middleware(['auth']);
Route::post('subscribe', 'PaymentController@subscription');

Auth::routes();
