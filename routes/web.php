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

Route::get('/', 'App\Http\Controllers\BerandaController@home');
Route::get('/service', 'App\Http\Controllers\BerandaController@service');
Route::get('/about', 'App\Http\Controllers\BerandaController@about');
Route::get('/trial', 'App\Http\Controllers\BerandaController@trial');

Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('/postlogin', 'App\Http\Controllers\LoginController@postlogin')->name('postlogin');
Route::post('/postregist', 'App\Http\Controllers\LoginController@postregist')->name('postregist');

Route::middleware(['auth', 'ceklevel:Admin'])->group(function () {
    Route::get('/users', 'App\Http\Controllers\PagesController@show')->name('show');
    //AdminController
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::post('/admin/create', 'App\Http\Controllers\AdminController@create')->name('admin.create');
    Route::get('admin/{id}/edit', 'App\Http\Controllers\AdminController@edit')->name('admin.edit');
    Route::post('admin/{id}/update', 'App\Http\Controllers\AdminController@update')->name('admin.update');
    Route::get('admin/{id}/destroy', 'App\Http\Controllers\AdminController@destroy')->name('admin.destroy');
    //PelangganController
    Route::get('/client', 'App\Http\Controllers\PelangganController@index')->name('client.index');
    Route::post('/client/create', 'App\Http\Controllers\PelangganController@create')->name('client.create');
    Route::get('client/{id}/edit', 'App\Http\Controllers\PelangganController@edit')->name('client.edit');
    Route::post('client/{id}/update', 'App\Http\Controllers\PelangganController@update')->name('client.update');
    Route::get('client/{id}/destroy', 'App\Http\Controllers\PelangganController@destroy')->name('client.destroy');
    //PlnController
    Route::get('/pln', 'App\Http\Controllers\PlnController@index')->name('pln.index');
    Route::post('/pln/create', 'App\Http\Controllers\PlnController@create')->name('pln.create');
    Route::get('pln/{id}/edit', 'App\Http\Controllers\PlnController@edit')->name('pln.edit');
    Route::post('pln/{id}/update', 'App\Http\Controllers\PlnController@update')->name('pln.update');
    Route::get('pln/{id}/destroy', 'App\Http\Controllers\PlnController@destroy')->name('pln.destroy');
    //BankControler
    Route::get('/bank', 'App\Http\Controllers\BankController@index')->name('bank.index');
    Route::post('/bank/create', 'App\Http\Controllers\BankController@create')->name('bank.create');
    Route::get('bank/{id}/edit', 'App\Http\Controllers\BankController@edit')->name('bank.edit');
    Route::post('bank/{id}/update', 'App\Http\Controllers\BankController@update')->name('bank.update');
    Route::get('bank/{id}/destroy', 'App\Http\Controllers\BankController@destroy')->name('bank.destroy');
});

Route::middleware(['auth', 'ceklevel:Admin,Pelanggan,Bank,PLN'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\PagesController@index')->name('dashboard');
    // Route::get('/profile/{id}', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
    Route::post('/profile-update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
    Route::get('/account/{id}', 'App\Http\Controllers\UserController@edit')->name('account.edit');
    Route::post('/user-update', 'App\Http\Controllers\UserController@userUpdate')->name('account.update');
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
    Route::get('/back', 'App\Http\Controllers\PagesController@back')->name('back');
});

Route::middleware(['auth', 'ceklevel:Pelanggan'])->group(function () {
    Route::get('/mybill', 'App\Http\Controllers\PagesController@mybill');
    Route::get('/bill-result', 'App\Http\Controllers\PagesController@search')->name('bill.result');
    Route::get('bill/{id}/edit', 'App\Http\Controllers\BillController@edit')->name('bill.edit');
    Route::post('bill/{id}/update', 'App\Http\Controllers\BillController@update')->name('bill.update');
    Route::get('/mytrans', 'App\Http\Controllers\PagesController@mytrans');
});

Route::middleware(['auth', 'ceklevel:PLN'])->group(function () {
    Route::get('/client-bills', 'App\Http\Controllers\PelangganController@index')->name('index');
    Route::get('/bills', 'App\Http\Controllers\BillController@index')->name('index');
    Route::post('/bills/postcreate', 'App\Http\Controllers\BillController@postcreate')->name('postcreate');
    Route::get('bills/{id}/create', 'App\Http\Controllers\BillController@create')->name('store');

});

Route::get('/dashboard-admin-trial', 'App\Http\Controllers\TrialController@admin');
Route::get('/dashboard-client-trial', 'App\Http\Controllers\TrialController@client');
Route::get('/dashboard-pln-trial', 'App\Http\Controllers\TrialController@pln');
Route::get('/dashboard-bank-trial', 'App\Http\Controllers\TrialController@bank');
Route::get('/trial', 'App\Http\Controllers\BerandaController@trial');
