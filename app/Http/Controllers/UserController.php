<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //注册
    public function register(){
        return view('user/create');
    }

    //执行注册
    public function regDo(){
        $post=request()->except('_token');
        $user_name=request()->input('user_name');

        //验空
        if(empty($user_name)){
            echo "用户名不能为空";die;
        }

        if(empty($post['email'])){
            echo "邮箱不能为空";die;
        }

        if(empty($post['tel'])){
            echo "手机号不能为空";die;
        }

        if(empty($post['pass'])){
            echo "密码不能为空";die;
        }

        if(empty($post['pass1'])){
            echo "确认密码不能为空";die;
        }

        //判断密码
        $pass=request()->input('pass');
        $pass1=request()->input('pass1');
        if($pass!=$pass1){
            echo "密码不正确 请重新输入";
            die;
        }

        //密码加密
        $pass=password_hash($post['pass'],PASSWORD_BCRYPT);

        //入库
        $data=[
            'user_name'      =>$user_name,
            'tel'       =>$post['tel'],
            'email'     =>$post['email'],
            'pass'      =>$pass,
        ];

        //注册成功--发送邮件
        $url=[];
        Mail::send('email.create',$url,function($message){
            $to=[
                '848332992@qq.com'
            ];
            $message->to($to)->subject("注册成功");
        });

        $uid=UserModel::insertGetId($data);
        echo "<script>alert('注册成功');location.href='/login/login';</script>";


    }
}
