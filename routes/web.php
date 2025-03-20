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
Route::get('/','App\Http\Controllers\ViduLayoutController@sach');
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')->middleware('auth')->name("account");
Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')->middleware('auth')->name('saveinfo');
Route::get('/managelistbook','App\Http\Controllers\AccountController@managebook')->middleware('auth')->name('managelistbook');
Route::get('/bookcreate','App\Http\Controllers\AccountController@createbook')->middleware('auth')->name('bookcreate');
Route::post('/addbook','App\Http\Controllers\AccountController@addbook')->middleware('auth')->name('addbook');
Route::get('/bookedit/{id}','App\Http\Controllers\AccountController@editbook')->middleware('auth')->name('bookedit');
Route::post('/bookdelete','App\Http\Controllers\AccountController@deletebook')->middleware('auth')->name('bookdelete');
Route::post('/bookupdate/{id}','App\Http\Controllers\AccountController@updatebook')->middleware('auth')->name('updatebook');
Route::get('/order','App\Http\Controllers\BookController@order')->name('order');

Route::get('/sach/theloai/{id}/','App\Http\Controllers\vidulayoutController@theloai');
Route::post('/bookview','App\Http\Controllers\BookController@bookview')->name("bookview");

Route::get('/sach/chitiet/{id}','App\Http\Controllers\ViduLayoutController@thongtinsach');
 Route::post('/cart/add','App\Http\Controllers\BookController@cartadd')->name('cartadd');
  Route::post('/cart/delete','App\Http\Controllers\BookController@cartdelete')->name('cartdelete');
 Route::post('/order/create','App\Http\Controllers\BookController@ordercreate') ->middleware('auth')->name('ordercreate');
 Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';