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

Route::get('/login','UserController@login');                     //登录view
Route::post('/logindo','UserController@loginDo');               //登录视图

Route::get('/user/center','UserController@userCenter');         //用户中心
Route::post('/user/outlogin','UserController@outLogin');         //退出登录

Route::get('/register','UserController@register');              //注册视图
Route::post('/regdo','UserController@regDo');                   //执行注册

Route::get('/findpass','UserController@findPass1');             //找回密码视图
Route::post('/findpass','UserController@findPass2');            //发送邮件

Route::get('/resetpass','UserController@resetPass1');           //重置密码视图
Route::post('/resetpass','UserController@resetPass2');          //重置密码
