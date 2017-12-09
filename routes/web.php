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
	return view('index');
});

Route::get('/menu', function () {
	return view('menu');
});

Route::get('/mypage', function () {
	return view('mypage');
});

Route::get('/play1', function () {
	return view('play1');
});

Route::get('/play2', function () {
	return view('play2');
});