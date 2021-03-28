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

Route::get('/', 'App\Http\Controllers\BerandaController@home'); //Route untuk ke halaman Landing Page

Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login'); //Route untuk ke halaman Login Page dan Register
Route::post('/postlogin', 'App\Http\Controllers\LoginController@postlogin')->name('postlogin'); //Route untuk meng-authentication email dan password saat login
Route::post('/postregist', 'App\Http\Controllers\LoginController@postregist')->name('postregist'); //Route untuk melakukan registrasi

/**
 * @author Ahmad Zaky Humami
 * 
 * @description Route Group ini dibuat khusus untuk halaman yang hanya dapat diakses oleh akun levels Admin
 */
Route::middleware(['auth', 'ceklevel:Admin'])->group(function () {
    Route::get('/users', 'App\Http\Controllers\PagesController@show')->name('show');
    //AdminController
    Route::get('users/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::post('/admin/create', 'App\Http\Controllers\AdminController@create')->name('admin.create');
    Route::get('admin/{id}/edit', 'App\Http\Controllers\AdminController@edit')->name('admin.edit');
    Route::post('admin/{id}/update', 'App\Http\Controllers\AdminController@update')->name('admin.update');
    Route::get('admin/{id}/destroy', 'App\Http\Controllers\AdminController@destroy')->name('admin.destroy');
    //PelangganController
    Route::get('users/client', 'App\Http\Controllers\PelangganController@index')->name('client.index');
    Route::post('/client/create', 'App\Http\Controllers\PelangganController@create')->name('client.create');
    Route::get('client/{id}/edit', 'App\Http\Controllers\PelangganController@edit')->name('client.edit');
    Route::post('client/{id}/update', 'App\Http\Controllers\PelangganController@update')->name('client.update');
    Route::get('client/{id}/destroy', 'App\Http\Controllers\PelangganController@destroy')->name('client.destroy');
    //PlnController
    Route::get('users/pln', 'App\Http\Controllers\PlnController@index')->name('pln.index');
    Route::post('/pln/create', 'App\Http\Controllers\PlnController@create')->name('pln.create');
    Route::get('pln/{id}/edit', 'App\Http\Controllers\PlnController@edit')->name('pln.edit');
    Route::post('pln/{id}/update', 'App\Http\Controllers\PlnController@update')->name('pln.update');
    Route::get('pln/{id}/destroy', 'App\Http\Controllers\PlnController@destroy')->name('pln.destroy');
    //BankControler
    Route::get('users/bank', 'App\Http\Controllers\BankController@index')->name('bank.index');
    Route::post('/bank/create', 'App\Http\Controllers\BankController@create')->name('bank.create');
    Route::get('bank/{id}/edit', 'App\Http\Controllers\BankController@edit')->name('bank.edit');
    Route::post('bank/{id}/update', 'App\Http\Controllers\BankController@update')->name('bank.update');
    Route::get('bank/{id}/destroy', 'App\Http\Controllers\BankController@destroy')->name('bank.destroy');
});

/**
 * @author Ahmad Zaky Humami
 * 
 * @description Route Group ini dibuat untuk halaman tertentu yang dapat diakses oleh semua levels 
 */
Route::middleware(['auth', 'ceklevel:Admin,Pelanggan,Bank,PLN'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\PagesController@index')->name('dashboard');
    Route::get('/account/{id}', 'App\Http\Controllers\UserController@edit')->name('account.edit');
    Route::post('/account/{id}/update', 'App\Http\Controllers\UserController@update')->name('account.update');
    Route::get('/pybill', 'App\Http\Controllers\PagesController@pybill')->name('admin.pybill');
    Route::get('/pytrans', 'App\Http\Controllers\PagesController@pytrans')->name('admin.pytrans');
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
    Route::get('/back', 'App\Http\Controllers\PagesController@back')->name('back');
});

/**
 * @author Ahmad Zaky Humami
 * 
 * @description Route Group ini dibuat khusus untuk halaman yang hanya dapat diakses oleh akun levels Pelanggan
 */
Route::middleware(['auth', 'ceklevel:Pelanggan'])->group(function () {
    Route::get('/mybill', 'App\Http\Controllers\PagesController@mybill');
    Route::get('/mybill/result', 'App\Http\Controllers\PagesController@search')->name('bill.result');
    Route::get('/mybill/not-found', 'App\Http\Controllers\PagesController@notFound')->name('bill.not-found');
    Route::get('/mybill/{id}/pay', 'App\Http\Controllers\BillController@edit')->name('bill.pay');
    Route::post('/mybill/{id}/paynow', 'App\Http\Controllers\BillController@update')->name('pay.post');
    Route::get('/mytrans', 'App\Http\Controllers\PagesController@mytrans');
    Route::get('/mytrans/confirmed', 'App\Http\Controllers\PagesController@mytransConfirm')->name('mytrans.confirm');
    /**
     * @author Ahmad Zaky Humami
     * @description Route dibawah ini berfungsi sebagai file downloader tagihan pelanggan.
     */
    Route::get('mytrans/download/file/{id}', function ($id) {
        $pathToFile = public_path()."/files/bill/BILL_". $id .".pdf";
        $name = "E-Bill ". $id ." PyTricity.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($pathToFile, $name, $headers);
    });
});

/**
 * @author Ahmad Zaky Humami
 * 
 * @description Route Group ini dibuat khusus untuk halaman yang hanya dapat diakses oleh akun levels PLN
 */
Route::middleware(['auth', 'ceklevel:PLN'])->group(function () {
    Route::get('/bills/unpaid', 'App\Http\Controllers\PagesController@billsUnpaid')->name('bills.unpaid');
    Route::get('/bills/paid', 'App\Http\Controllers\PagesController@billsPaid')->name('bills.paid');
    Route::get('/bills/confirmed', 'App\Http\Controllers\PagesController@billsConfirm')->name('bills.confirmed');
    Route::post('/bills/postcreate', 'App\Http\Controllers\BillController@postcreate')->name('bills.post');
    Route::get('bills/{id}/create', 'App\Http\Controllers\BillController@create')->name('store');
});

/**
 * @author Ahmad Zaky Humami
 * 
 * @description Route Group ini dibuat khusus untuk halaman yang hanya dapat diakses oleh akun levels Bank
 */
Route::middleware(['auth', 'ceklevel:Bank'])->group(function () {
    Route::get('/trans', 'App\Http\Controllers\PagesController@trans')->name('trans');
    Route::get('/trans/{id}/confirm', 'App\Http\Controllers\BillController@confirm')->name('bill.confirm');
    Route::post('/trans/{id}/confirmnow', 'App\Http\Controllers\BillController@confirmNow')->name('confirm.post');
    Route::get('/trans/{id}/refuse', 'App\Http\Controllers\BillController@refuse')->name('bill.refuse');
    Route::post('/trans/{id}/refusenow', 'App\Http\Controllers\BillController@refuseNow')->name('refuse.post');
});