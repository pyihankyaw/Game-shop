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

Route::get('/', 'HomeController@welcome');

Route::get("/login", "Auth\LoginController@showLoginForm")->name('login');
Route::post("login", "Auth\LoginController@login");
Route::post("login", "Auth\LoginController@logout")->name("logout");

Route::middleware(['auth'])->group(function(){

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
Route::put('/categories/{id}', 'CategoryController@update')->name('categories.update');
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::post('/categories', 'CategoryController@store')->name('categories.store');
Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.destroy');

Route::get('/companies/create', 'CompanyController@create')->name('companies.create');
Route::get('/companies/{id}/edit', 'CompanyController@edit')->name('companies.edit');
Route::put('/companies/{id}', 'CompanyController@update')->name('companies.update');
Route::get('/companies', 'CompanyController@index')->name('companies.index');
Route::post('/companies', 'CompanyController@store')->name('companies.store');
Route::delete('/companies/{id}', 'CompanyController@destroy')->name('companies.destroy');

Route::get('/platforms/create', 'PlatformController@create')->name('platforms.create');
Route::get('/platforms/{id}/edit', 'PlatformController@edit')->name('platforms.edit');
Route::put('/platforms/{id}', 'PlatformController@update')->name('platforms.update');
Route::get('/platforms', 'PlatformController@index')->name('platforms.index');
Route::post('/platforms', 'PlatformController@store')->name('platforms.store');
Route::delete('/platforms/{id}', 'PlatformController@destroy')->name('platforms.destroy');

Route::resource('games', 'GameController');
});