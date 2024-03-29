<?php

use App\Post;
use App\User;

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


Route::get('/create', function () {
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My first Post','body'=>'I love laravel']);
    $user->posts()->save($post);
});

Route::get('/update', function () {
    $user = User::findOrFail(1);
    $user->posts()->where('id','=',2)->update(['title'=>'title 2','body'=>'2 That is awesome']);
});

Route::get('/delete', function () {
    $user = User::find(1);
    $user->posts()->whereId(1)->delete();
});