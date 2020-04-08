<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Model\UserModel;
use App\Model\FindPassModel;


class UserController extends Controller
{
    public function findpass1()
    {
        return view('user.findpass');
    }

    public function findpass2(Request $request)
    {
        $uname = $request->input('u');
        $u = UserModel::where(['user_name'=>$uname])
            ->orWhere(['email'=>$uname])
            ->orWhere(['tel'=>$uname])
            ->first();

        // 给该用户发送重置密码邮件
        if($u){
            $token = Str::random(32);
            $data = [
                'uid'       => $u->id,
                'token'     => $token,
                'expire'    => time() + 300  //5分钟后失效
            ];
            FindPassModel::create($data);

            // 密码重置链接
            $link = [
                'url'   => env('APP_URL'). '/resetpass?token='.$token
            ];
            Mail::send('email.findpass',$link,function($message){
                //收件人数组
                    $to = [
                        'zhang2877503663@163.com',
                    ];
                    $message ->to($to)->subject('重置密码');
             });

            $email = $u->email;
            echo "<script>alert('密码重置链接已发送至".$email."')</script>";
        }
    }
}
