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

Route::get('/halo', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return '<h1>Helo dud</h1>';
});

Route::get('/halo-parameter/{name}', function ($name) {
    return '<h1>Helo werld '. $name .'</h1>';
});

Route::get('/halo-parameter-nullable/{name?}', function ($name = 'No name') {
    return '<h1>Helo werld '. $name .'</h1>';
});

Route::get('/halo-parameter-v', function () {
    return view('halo-parameter-v');
});

Route::get('/halo-parameter-v-data', function () {
    return view('halo-parameter-v-data', ['data' => 'Salto']);
});

Route::get('/halo-parameter-v-data-if', function () {
   return view('halo-parameter-v-data-if', ['data' => 'uwow']);
//   return view('halo-parameter-v-data-if', ['data' => '']);
});

//Route::get('/projects', function () {
//    return view('projects');
//});

Route::get('/app', function () {
    return view('/layouts/app');
});

//Route::get('/post', 'PostController@post');
//Route::get('/post/create', 'PostController@create');
//Route::post('/post', 'PostController@store');
//Route::get('/post/{id}', 'PostController@show');
//Route::get('/post/{id}/edit', 'PostController@edit');
//Route::put('/post/{id}', 'PostController@update');
//Route::delete('/post/{id}', 'PostController@destroy');



//Route::get('/home', function () {
//    return view('/home/index');
//});
//
Route::get('/starter', function () {
    return view('/layouts/starter');
});

Route::resource('posts', 'App\Http\Controllers\PostController');
Route::resource('projects', 'App\Http\Controllers\ProjectController');
Route::resource('education', 'App\Http\Controllers\EducationController');
Route::resource('about', 'App\Http\Controllers\AboutController');
Route::resource('home', 'App\Http\Controllers\HomeMainController');

