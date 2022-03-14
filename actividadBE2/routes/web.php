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
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('platforms')->group(function(){
    Route::match(['get', 'post'], '/', 'PlatformController@Index')->name('platforms.index');
    Route::get('/create', 'PlatformController@create')->name('platforms.create');
    Route::post('/store', 'PlatformController@store')->name('platforms.store');
    Route::delete('/{platform}/delete', 'PlatformController@delete')->name('platforms.delete');
    Route::get('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    Route::post('/{platform}/update', 'PlatformController@update')->name('platforms.update');
});

Route::prefix('directors')->middleware('auth')->group(function(){
    Route::match(['get', 'post'], '/', 'DirectorController@Index')->name('directors.index');
    Route::get('/create', 'DirectorController@create')->name('directors.create');
    Route::post('/store', 'DirectorController@store')->name('directors.store');
    Route::delete('/{director}/delete', 'DirectorController@delete')->name('directors.delete');
    Route::get('/{director}/edit', 'DirectorController@edit')->name('directors.edit');
    Route::post('/{director}/update', 'DirectorController@update')->name('directors.update');
});

Route::prefix('series')->middleware('auth')->group(function(){
    Route::match(['get', 'post'], '/', 'SerieController@Index')->name('series.index');
    Route::get('/create', 'SerieController@create')->name('series.create');
    Route::post('/store', 'SerieController@store')->name('series.store');
    Route::delete('/{serie}/delete', 'SerieController@delete')->name('series.delete');
    Route::get('/{serie}/edit', 'SerieController@edit')->name('series.edit');
    Route::post('/{serie}/update', 'SerieController@update')->name('series.update');
});

Route::prefix('actors')->middleware('auth')->group(function(){
    Route::match(['get', 'post'], '/', 'ActorController@Index')->name('actors.index');
    Route::get('/create', 'ActorController@create')->name('actors.create');
    Route::post('/store', 'ActorController@store')->name('actors.store');
    Route::delete('/{actor}/delete', 'ActorController@delete')->name('actors.delete');
    Route::get('/{actor}/edit', 'ActorController@edit')->name('actors.edit');
    Route::post('/{actor}/update', 'ActorController@update')->name('actors.update');
});

Route::prefix('languages')->middleware('auth')->group(function(){
    Route::match(['get', 'post'], '/', 'LanguageController@Index')->name('languages.index');
    Route::get('/create', 'LanguageController@create')->name('languages.create');
    Route::post('/store', 'LanguageController@store')->name('languages.store');
    Route::delete('/{language}/delete', 'LanguageController@delete')->name('languages.delete');
    Route::get('/{language}/edit', 'LanguageController@edit')->name('languages.edit');
    Route::post('/{language}/update', 'LanguageController@update')->name('languages.update');
});


