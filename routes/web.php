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


Route::group(['middleware' =>['web']] , function(){

    Route::get('blog/{slug}' , ['as'=> 'blog.single' , 'uses' => 'BlogController@getSingle'])
                    ->where('slug' , '[\w\d\-\_]+');
    Route::get('blogs' ,  ['as ' => 'blog.index' , 'uses' => 'BlogController@getIndex']);

    Route::get('/', 'PagesController@welcom');

    Route::get('about', 'PagesController@about');
    
    Route::get('contact', 'PagesController@contact');
    Route::post('contact', 'PagesController@postContact');
    
    
    Route::resource('posts', 'PostController');
    

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Password Reset Routes

// Categories

    Route::resource('categories' , 'CategoryController' , ['except' => ['create']]);

    //Tags Contrller
    Route::resource('tags' , 'TagController' , ['except' => ['create']]);