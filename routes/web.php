<?php
# Halaman utama
Route::get('/', function () {
    return view('welcome');
});
# Halaman senarai users
Route::get('senarai-users', 'UserController@index');
# Halaman papar borang tambah user baru
Route::get('senarai-users/add', 'UserController@create');
# Urus request untuk simpan rekod user baru ke DB
Route::post('senarai-users/add', 'UserController@store');
# Papar borang untuk edit user
Route::get('senarai-users/{id}', 'UserController@edit')->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
