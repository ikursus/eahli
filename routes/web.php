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
# Kemaskini rekod user
Route::patch('senarai-users/{id}', 'UserController@update')->where('id', '[0-9]+');
# Hapuskan rekod user
Route::delete('senarai-users/{id}', 'UserController@destroy');

# Route untuk pengurusan payments
Route::get('payments', 'PaymentController@index');
# Halaman papar borang tambah user baru
Route::get('payments/add', 'PaymentController@create');
# Urus request untuk simpan rekod user baru ke DB
Route::post('payments/add', 'PaymentController@store');
# Papar borang untuk edit user
Route::get('payments/{id}', 'PaymentController@edit')->where('id', '[0-9]+');
# Kemaskini rekod user
Route::patch('payments/{id}', 'PaymentController@update')->where('id', '[0-9]+');
# Hapuskan rekod user
Route::delete('payments/{id}', 'PaymentController@destroy');

# Route untuk authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
