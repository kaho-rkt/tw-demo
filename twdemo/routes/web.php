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

//Route::get('/', function () {
    //return view('welcome');
//});

//新規登録
// Route::get('/create','UserController@create');
// Route::post('/store','UserController@store');
// //一覧
// Route::get('/','UserController@index');
// //修正
// Route::get('/edit/{id}','UserController@edit');
// Route::post('/update','UserController@update');
// //削除
// Route::get('/delete/{id}','UserController@getDelete');
// Route::post('/delete','UserController@postDelete');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//トップページ
Route::get('/','HomeController@index');
//ツイートを保存
Route::post('/tweet','TweetController@update')->name('tweet');

//ユーザー一覧
Route::get('/users','UserController@index')->name('user_list');
//フォローを実行する
Route::post('/users/follow','UserController@follow')->name('user_follow');


