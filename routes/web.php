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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('medicines', 'MedicineController');
Route::get('coba1', 'MedicineController@coba1');
Route::get('coba2', 'CategoryController@coba2');
Route::resource('categories', 'CategoryController');
Route::get('report/listmedicine/{id}','CategoryController@showlist');
Route::post('/medicines/showInfo','MedicineController@showInfo')->name('medicines.showInfo');//ajax

Route::resource('transaction', 'TransactionController');
//ajax
Route::post('transaction/showAjax/','TransactionController@showAjax')->name('transaction.showAjax');//cara 1
Route::get('transaction/showAjax2/{id}','TransactionController@showAjax2')->name('transaction.showAjax2');//cara 2

