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
Route::get('/trang1','App\Http\Controllers\BookController@trang1');
Route::get("/qlsach/theloai","App\Http\Controllers\BookController@laythongtintheloai");
Route::get("/qlsach/thongtinsach","App\Http\Controllers\BookController@laythongtinsach");
Route::get("/qlsach/trangthem_1","App\Http\Controllers\BookController@trang_them_1");
Route::post("/qlsach/themtheloai_1","App\Http\Controllers\BookController@them_the_loai_1");
Route::get("/qlsach/trangthem_2","App\Http\Controllers\BookController@trang_them_2");
Route::post("/qlsach/themtheloai_2","App\Http\Controllers\BookController@them_the_loai_2");
Route::get('/sach','App\Http\Controllers\ViduLayoutController@sach');
Route::get('/sach/theloai/{id}','App\Http\Controllers\ViduLayoutController@theloai');
Route::get('/sach/theloai/thongtinsach/{id}','App\Http\Controllers\ViduLayoutController@thongtinsach');