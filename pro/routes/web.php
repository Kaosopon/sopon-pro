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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();


Route::middleware(['auth','VerifyIsadmin'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    //Admin
    Route::get('/Admin/index' , 'Admin\AdminController@index')->name('admin');

    //Menu
    Route::get('/Admin/menu' , 'Admin\MenuController@index')->name('menu');
    Route::get('/Admin/add_menu' , 'Admin\MenuController@add')->name('add_menu');
    Route::get('/Admin/edit_menu/{id}' , 'Admin\MenuController@edit');
    Route::get('/Admin/menu/delete/{id}' , 'Admin\MenuController@delete');
    Route::get('/status/update/menu', 'Admin\MenuController@updateStatus')->name('menu.update.status');

    Route::post('/Admin/menu/create' , 'Admin\MenuController@create')->name('create_menu');
    Route::post('/Admin/menu/update/{id}', 'Admin\MenuController@update');

    //source
    Route::get('/Admin/source' , 'Admin\SourceController@index')->name('source');
    Route::get('/Admin/add_source' , 'Admin\SourceController@add')->name('add_source');
    Route::get('/Admin/edit_source/{id}' , 'Admin\SourceController@edit');
    Route::get('/Admin/source/delete/{id}' , 'Admin\SourceController@delete');
    Route::get('/status/source/type', 'Admin\SourceController@updateStatus')->name('source.update.status');

    Route::post('/Admin/source/create' , 'Admin\SourceController@create')->name('create_source');
    Route::post('/Admin/source/update/{id}', 'Admin\SourceController@update');

    //content
    Route::get('/Admin/content' , 'Admin\Contentcontroller@index')->name('content');
    Route::get('/Admin/add_content' , 'Admin\Contentcontroller@add')->name('add_content');
    Route::get('/Admin/edit_content/{id}' , 'Admin\Contentcontroller@edit');
    Route::get('/Admin/content/delete/{id}' , 'Admin\Contentcontroller@delete');

    Route::post('/Admin/content/create' , 'Admin\Contentcontroller@create')->name('create_content');
    Route::post('/Admin/content/update/{id}', 'Admin\Contentcontroller@update');

    //type
    Route::get('/Admin/type' , 'Admin\TypeController@index')->name('type');
    Route::get('/Admin/add_type' , 'Admin\TypeController@add')->name('add_type');
    Route::get('/Admin/edit_type/{id}' , 'Admin\TypeController@edit');
    Route::get('/Admin/type/delete/{id}' , 'Admin\TypeController@delete');
    Route::get('/status/update/type', 'Admin\TypeController@updateStatus')->name('type.update.status');

    Route::post('/Admin/type/create' , 'Admin\TypeController@create')->name('create_type');
    Route::post('/Admin/type/update/{id}', 'Admin\TypeController@update');

    //header
    Route::get('/Admin/header' , 'Admin\HeaderController@index')->name('header');
    Route::get('/Admin/add_header' , 'Admin\HeaderController@add')->name('add_header');
    Route::get('/Admin/edit_header/{id}' , 'Admin\HeaderController@edit');
    Route::get('/Admin/header/delete/{id}' , 'Admin\HeaderController@delete');
    Route::get('/status/update/header', 'Admin\HeaderController@updateStatus')->name('header.update.status');

    Route::post('/Admin/header/create' , 'Admin\HeaderController@create')->name('create_header');
    Route::post('/Admin/header/update/{id}', 'Admin\HeaderController@update');
    //front

});

