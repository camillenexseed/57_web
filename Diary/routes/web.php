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

// クラスを読んでいる
// クラスのインスタンスを生成していなくてもアクセスできるメソッドやプロパティ
// PHPのstaticメソッド、staticプロパティ

// class Root{
//     public static function get() {
//     }
// }
// $root = new Route();
// $root->get();
// // ↓書き替え可能↓
// Route::get();

Route::get('/', 'DiaryController@index')->name('diary.index'); //追加

Route::get('/', 'DiaryController@index')->name('diary.index'); //追加

// Route::get('/', function () {
//     return view('welcome');
// });
