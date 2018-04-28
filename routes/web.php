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
Route::get('/', [
	'uses' => 'TopPageController@index',
	'as' => 'top'
]);

Route::get('/menu', [
	'uses' => 'MenuController@index',
	'as' => 'top'
]);

Route::get('/mypage', [
	'uses' => 'MyPageController@index',
	'as' => 'top'
]);

Route::get('/yourplayrequests', [
	'uses' => 'PlayRequestsController@fromYou',
	'as' => 'top'
]);

Route::get('/newplayrequest', [
	'uses' => 'PlayRequestsController@getNew',
	'as' => 'create'
]);

Route::post('/newplayrequest', [
	'uses' => 'PlayRequestsController@postNew',
	'as' => 'post_create'
]);

Route::get('/editplayrequest/{id}', [
	'uses' => 'PlayRequestsController@getEdit',
	'as' => 'edit'
]);

Route::post('/editplayrequest/{id}', [
	'uses' => 'PlayRequestsController@postEdit',
	'as' => 'post_edit'
]);

Route::get('/deleteplayrequest/{id}', [
	'uses' => 'PlayRequestsController@getDelete',
	'as' => 'destroy'
]);

Route::post('/deleteplayrequest/{id}', [
	'uses' => 'PlayRequestsController@postDelete',
	'as' => 'post_destroy'
]);

Route::get('/playselect', [
	'uses' => 'PlayController@select',
	'as' => 'top'
]);

Route::get('/playhand/{id}', [
	'uses' => 'PlayController@hand',
	'as' => 'top'
]);

Route::get('/playresult/{id1}/{id2}', [
	'uses' => 'PlayController@result',
	'as' => 'top'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
