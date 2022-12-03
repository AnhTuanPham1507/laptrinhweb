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

Route::get('/ownermember',['as'=>'ownermember', 'uses'=>'OwnerMemberController@index']);
Route::get('/ownermember/filter',['as'=>'filter_ownermember', 'uses'=>'OwnerMemberController@filter']);
Route::get('/ownermember/search',['as'=>'search_ownermember', 'uses'=>'OwnerMemberController@search']);
Route::post('/ownermember/create', ['as'=>'create_ownermember', 'uses'=>'OwnerMemberController@create']);
Route::post('/ownermember/update', ['as'=>'update_ownermember', 'uses'=>'OwnerMemberController@update']);
Route::post('/ownermember/delete', ['as'=>'delete_ownermember', 'uses'=>'OwnerMemberController@delete']);
Route::post('/ChiPhi/create', ['as'=>'create_ChiPhi', 'uses'=>'ChiPhi@create']);
Route::post('/ChiPhi/update', ['as'=>'update_ChiPhi', 'uses'=>'ChiPhi@update']);
Route::post('/ChiPhi/delete', ['as'=>'delete_ChiPhi', 'uses'=>'ChiPhi@delete']);
Route::get('/', 'TaskController@index')->name('index');
Route::post('/task', 'TaskController@store')->name('store.task');
Route::delete('/task/{task}', 'TaskController@delete')->name('delete.task');