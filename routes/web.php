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
Auth::routes();

//Route::get('/email',function(){
//    return new \App\Mail\NewUserWelcomeMail();
//});

Route::get('/','BlogController@blog')->name('welcome');
Route::get('/blog/{id}','BlogController@full_blog')->name('blog.full_blog');
Route::post('/blog','BlogController@store_comment')->name('blog.store_comment');

Route::get('/manage','ManageController@index')->name('manage.index');
Route::delete('/manage/{id}','ManageController@destroy')->name('manage.destroy');
 
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts/create','ContactController@create')->name('contacts.create');
Route::post('/contacts','ContactController@store')->name('contacts.store');

Route::resource('categories', 'CategoryController');

Route::resource('posts', 'PostController');

Route::resource('comments', 'CommentController');
