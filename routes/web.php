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


Route::get('/home','Admin\AdminController@home') ->middleware('auth')->name('home');
Route::get('/details','Admin\AdminController@details') ->middleware('auth')->name('AddDetails');
Route::post('/update','Admin\Admincontroller@updatedetails')->name('updateprofile');
Route::get('/viewprofile/{id}','Admin\AdminController@viewprofile') ->middleware('auth')->name('viewprofile');
Route::get('/vieweditprofile/{id}','Admin\AdminController@showedit') ->middleware('auth')->name('showeditprofile');
Route::post('/editaction','Admin\Admincontroller@actEditProfile')->name('editprofile');

