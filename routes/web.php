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

Route::group(['prefix' => LaravelLocalization::setLocale(),
	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
],
	function () {
		Auth::routes();
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('/add-contact', 'ContactController@index')->name('add-contact');
		Route::get('/edit-contact/{id}', 'ContactController@edit');
//Route::get('/edit-contact', 'ContactController@edit');
		Route::get('/view-contact/{id}', 'ViewContact@index');

	});

Route::post('/edit-contact', 'ContactController@update');
Route::post('/add-contact', 'ContactController@store');
Route::post('/upload', [
	'uses' => 'ContactController@uploadImage',
	'as' => 'contact.upload',
]);
Route::get('contactImage/{filename}', [
	'uses' => 'ContactController@getContactImage',
	'as' => 'contact.image',
]);
Route::get('/search', 'HomeController@search');