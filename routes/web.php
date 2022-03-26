<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');;
});

Route::get('/home', function () {
    return redirect('user');
})->middleware('role:user');

// Route::get('/', 'DomainController@index');

Auth::routes();

Route::get('admin-page', function () {
    return redirect('domain');
})->middleware('role:admin')->name('admin');

Route::get('user-page', function () {
    return redirect('user');
})->middleware('role:user')->name('user');


// Route::get('admin-domain', 'DomainController@index');
Route::resource('user', UserDomainController::class);
Route::resource('domain', DomainController::class);

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
