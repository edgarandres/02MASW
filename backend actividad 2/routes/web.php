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

Route::prefix('platforms')->group(function(){
    Route::get('/', 'PlatformController@Index')->name('platforms.index');
    Route::post('/create', 'PlatformController@create')->name('platforms.create');
    Route::post('/store', 'PlatformController@store')->name('platforms.store');
    Route::put('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    Route::put('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    Route::delete('/{platform}/delete', 'PlatformController@delete')->name('platforms.delete');
});

/*
Route::view('/welcome', 'welcome', ['name' => 'Pedro', 'surname' => 'Martinez']);

Route::get('listado_usuarios', function () {
    return 'Listado de usuarios';
})->name('user_list');

Route::get('user/{id}', function ($id) {
    return 'Usuario con el ID = '. $id;
})->name('user_detail');

Route::get('user/{id}/category/{categoryName?}', function ($id, $categoryName = 'defacto'){
    return 'Usuario con el ID = '. $id. ' y categoria = '. $categoryName;
})->name('user_with_category');*/

/* Agrupar rutas*/
/*
Route::midleware(['first', 'second'])->group(function() {

    Route::get('/', function() {
        //uses first and second midleware
    });

    Route::get('user/profile', function() {
        //uses forst and second midleware
    });

});*/

/*Prefijos*/
/*Route::prefix(¿'users)*/