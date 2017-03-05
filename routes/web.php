<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index')->name('page.index');

Route::get('/link/{user}', 'LinkController@user')->name('link.user');

Route::group(['middleware' => 'auth'], function () {
  Route::resource('/link', 'LinkController');
});

Auth::routes();
