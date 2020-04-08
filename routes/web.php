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

<<<<<<< HEAD
Route::get('/login/login','UserController@login');                      //登录视图
Route::post('/login/login_do','UserController@loginDo');               //登录视图


Route::get('/register','UserController@register'); //注册视图
Route::post('/regDo','UserController@regDo'); //执行注册


Route::get('/find_pass','UserController@findpass1');
Route::post('/findPass','UserController@findpass2');

=======
Route::prefix('/org')->group(function(){
    Route::any('/change_pass','OrgController@change_pass');  //注册页面
    Route::any('upd','OrgController@upd');  //注册方法
});
>>>>>>> org
