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

Auth::routes();
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-contact', 'AddContact@index')->name('add-contact');
Route::get('/edit-contact/{id}', 'AddContact@edit');
Route::post('/edit-contact', 'AddContact@edit');
Route::post('/edit-contact', 'AddContact@update');
Route::get('/view-contact/{id}','ViewContact@index');
Route::get('/search','HomeController@search');
Route::post('/upload',[
        'uses' => 'AddContact@uploadImage',
        'as' => 'contact.upload'
]);
Route::get('contactImage/{filename}',[
    'uses'=> 'AddContact@getContactImage',
    'as' => 'contact.image'
]);
    });