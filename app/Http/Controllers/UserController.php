<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;                        //UserModel
use Illuminate\Support\Facades\Hash;            //HASH

class UserController extends Controller
{
    /**
     *登录视图
     */
    public function login()
    {

        return view('user.login');
    }

    /**
     *执行登录
     */
    public function loginDo(Request $request)
    {
        //接收账号
        $account = $request->input('account');
        //接收密码
        $pass = $request->input('pass');

        //根据用户名在数据库中进行查询
        $user_info = UserModel::where(['tel' => $account])->orWhere(['email'  => $account])->orWhere(['user_name' => $account])->first();
        //dd($user_info);

        //判断数据库中是否能查到
        if($user_info == null){
            header('Refresh:2;url=/register');
            echo "此用户不存在，请您先注册";
            die;
        }

        //接收密码
        $pass = $request->input('pass');

        //使用门面Hash中check()方法，进行验证，对比当前密码和数据库加密之后的密码是否相同。
        if(!Hash::check($pass,$user_info['pass'])){
            echo "密码有误";
            die;
        }

        header('Refresh:2;url=/user/center');
        echo "登录成功，正在跳转至个人中心....";

    }
}
