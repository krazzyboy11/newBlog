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
/*Route::get('/', [
    'uses' => 'BlogController@index',
    'as'   => 'blog'
]);*/
Route::get('/','BlogController@index')->name('blog');

Route::get('/blog/{post}','BlogController@show')->name('blog.show');

/*Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as'   => 'blog.show'
]);*/
Route::get('/category/{category}','BlogController@category')->name('category');
Route::get('/author/{author}','BlogController@author')->name('author');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::put('/backend/blog/restore/{blog}', 'Backend\BlogController@restore')->name('backend.blog.restore');
Route::delete('/backend/blog/force-destroy/{blog}', 'Backend\BlogController@forceDestroy')->name('backend.blog.force-destroy');
Route::resource('/backend/blog', 'Backend\BlogController', ['as' => 'backend']);
Route::resource('/backend/category', 'Backend\CategoriesController', ['as' => 'backend']);
Route::resource('/backend/users', 'Backend\UsersController', ['as' => 'backend']);
Route::get('/backend/users/confirm/{users}','Backend\UsersController@confirm')->name('backend.users.confirm');

