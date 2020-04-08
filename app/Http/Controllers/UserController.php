<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
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
        $user_info = UserModel::where(['tel' => $account])->orWhere(['email' => $account])->orWhere(['user_name' => $account])->first();
        //dd($user_info);

        //判断数据库中是否能查到
        if ($user_info == null) {
            header('Refresh:2;url=/register');
            echo "此用户不存在，请您先注册";
            die;
        }

        //接收密码
        $pass = $request->input('pass');

        //使用门面Hash中check()方法，进行验证，对比当前密码和数据库加密之后的密码是否相同。
        if (!Hash::check($pass, $user_info['pass'])) {
            echo "密码有误";
            die;
        }


        header('Refresh:2;url=/user/center');
        echo "登录成功，正在跳转至个人中心....";

    }

        //注册
        public function register()
        {
            return view('user/create');
        }

         //执行注册
         public function regDo()
         {
             $post = request()->except('_token');
             $user_name = request()->input('user_name');

             //验空
             if (empty($user_name)) {
                 echo "用户名不能为空";
                 die;
             }

             if (empty($post['email'])) {
                 echo "邮箱不能为空";
                 die;
             }

             if (empty($post['tel'])) {
                 echo "手机号不能为空";
                 die;
             }

             if (empty($post['pass'])) {
                 echo "密码不能为空";
                 die;
             }

             if (empty($post['pass1'])) {
                 echo "确认密码不能为空";
                 die;
             }

             //判断密码
             $pass = request()->input('pass');
             $pass1 = request()->input('pass1');
             if ($pass != $pass1) {
                 echo "密码不正确 请重新输入";
                 die;
             }

             //密码加密
             $pass = password_hash($post['pass'], PASSWORD_BCRYPT);

             //入库
             $data = [
                 'user_name' => $user_name,
                 'tel' => $post['tel'],
                 'email' => $post['email'],
                 'pass' => $pass,
             ];
             $uid = UserModel::insertGetId($data);

             //注册成功--发送邮件
             $url = [];
             Mail::send('email.create', $url, function ($message) {
                 $to = [
                     '848332992@qq.com'
                 ];
                 $message->to($to)->subject("注册成功");
             });

             echo "<script>alert('注册成功');location.href='/login/login';</script>";
         }

     }

