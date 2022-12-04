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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ownermember',['as'=>'ownermember', 'uses'=>'OwnerMemberController@index'])->middleware(['auth'])->middleware('can:authorization');
Route::get('/ownermember/filter',['as'=>'filter_ownermember', 'uses'=>'OwnerMemberController@filter'])->middleware(['auth'])->middleware('can:authorization');
Route::get('/ownermember/search',['as'=>'search_ownermember', 'uses'=>'OwnerMemberController@search'])->middleware(['auth'])->middleware('can:authorization');
Route::post('/ownermember/create', ['as'=>'create_ownermember', 'uses'=>'OwnerMemberController@create'])->middleware(['auth'])->middleware('can:authorization');
Route::post('/ownermember/update', ['as'=>'update_ownermember', 'uses'=>'OwnerMemberController@update'])->middleware(['auth'])->middleware('can:authorization');
Route::post('/ownermember/delete', ['as'=>'delete_ownermember', 'uses'=>'OwnerMemberController@delete'])->middleware(['auth'])->middleware('can:authorization');

Route::get('/user/confirm', ['as'=>'confirm_user', 'uses'=>'Auth\ConfirmRegisterController@SetActiveForUser']);
Route::get('/user/deny', ['as'=>'deny_user', 'uses'=>'Auth\ConfirmRegisterController@DenyUser']);

Auth::routes();

