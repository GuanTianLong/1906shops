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

Route::get('/login','UserController@login');                      //登录视图
Route::post('/login_do','UserController@loginDo');               //登录视图


Route::get('/register','UserController@register'); //注册视图
Route::post('/regDo','UserController@regDo'); //执行注册

Route::get('/user/center','UserController@userCenter'); //用户中心


Route::get('/findpass','UserController@findPass1');  //找回密码视图
Route::post('/findpass','UserController@findPass2');  //发送邮件

Route::get('/resetpass','UserController@resetPass1');  //重置密码视图
Route::post('/resetpass','UserController@resetPass2');  //重置密码


Route::get('/changepass','UserController@vChangePass');  //修改密码 view
Route::post('/changepass','UserController@changePass');  //修改密码


//Route::prefix('/org')->group(function(){
//    Route::any('/change_pass','OrgController@change_pass');  //注册页面
//    Route::any('upd','OrgController@upd');  //注册方法
//});
