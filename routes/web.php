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
Route::get('/user/confirm', ['as'=>'confirm_user', 'uses'=>'Auth\ConfirmRegisterController@SetActiveForUser'])->middleware(['auth'])->middleware('can:authorization');
Route::get('/user/deny', ['as'=>'deny_user', 'uses'=>'Auth\ConfirmRegisterController@DenyUser'])->middleware(['auth'])->middleware('can:authorization');
Route::get('/productlist',['as'=>'PropertyList','uses'=>'PropertyListController@listProduct'])->middleware(['auth'])->middleware('can:authorization');
Route::get('/property',['as' => 'Property','uses' => 'PropertyController@index'])->middleware(['auth'])->middleware('can:authorization');
Route::get('prodetail/{PropertyId}',['as'=>'prodetail','uses'=>'PropertyController@getPropertyDetail'])->middleware(['auth'])->middleware('can:authorization');
Route::post('/prodetail/update', ['as'=>'update_property', 'uses'=>'PropertyController@update'])->middleware(['auth'])->middleware('can:authorization');
Route::get('/owner',['as'=>'owner','uses'=>'OwnerController@ownerlist'])->middleware(['auth'])->middleware('can:authorization');
Route::get('addowner',['as' => 'addowner','uses' => 'OwnerController@addowner'])->middleware(['auth'])->middleware('can:authorization');
Route::post('/insert', ['as' => 'insert', 'uses' => 'OwnerController@insertowner'])->middleware(['auth'])->middleware('can:authorization');
Route::get('/deleteowner/{id}',['as'=>'deleteowner','uses'=>'OwnerController@deleteowner'])->middleware(['auth'])->middleware('can:authorization');
Route::post('/owner/update', ['as'=>'update_owner', 'uses'=>'OwnerController@update'])->middleware(['auth'])->middleware('can:authorization');
Auth::routes();

Route::post('/ChiPhi/create', ['as'=>'create_ChiPhi', 'uses'=>'ChiPhi@create']);
Route::post('/ChiPhi/update', ['as'=>'update_ChiPhi', 'uses'=>'ChiPhi@update']);
Route::post('/ChiPhi/delete', ['as'=>'delete_ChiPhi', 'uses'=>'ChiPhi@delete']);
Route::get('/task', 'TaskController@index')->name('index');
Route::post('/task', 'TaskController@store')->name('store.task');
Route::delete('/task/{task}', 'TaskController@delete')->name('delete.task');
