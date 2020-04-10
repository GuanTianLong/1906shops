<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\UserModel;                        //UserModel
use Illuminate\Support\Facades\Hash;            //HASH
use Illuminate\Support\Facades\Mail;            //Mail
use Illuminate\Support\Str;

use App\Model\FindPassModel;

class UserController extends Controller
{
    /**
        *登录view
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

        //登录成功----发送邮件
        $data = [
            'user_name' => $user_info['user_name'],
            'time'      => date('Y-m-d H:i:s',time()),
            'ip'        => $_SERVER['REMOTE_ADDR'],
            'url'       => env('APP_URL'),
        ];
        Mail::send('email.email', $data, function ($message) use ($account) {
            $user = UserModel::where(['tel' => $account])->orWhere(['email' => $account])->orWhere(['user_name' => $account])->first();
            $to = [
                $user['email']
            ];

            $message->to($to)->subject("登录成功");

        });

        //登录成功，存入SESSION中
        session(['user_name' => $user_info['user_name']]);

        header('Refresh:2;url=/user/center');
        echo "登录成功，正在跳转至个人中心....";

    }


    //用户中心view
    public function userCenter()
    {
        return view('user.center');
    }

    //点击退出登录
    public function outLogin(Request $request){
        //清除session
        $request->session()->flush();
        echo "<script>alert('退出成功，正在跳转至登录页...');location.href='/login'</script>";
        

    }

    //注册视图
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
        $arr = [
            'user_name' =>$post['user_name'],
            'time'=>date('Y-m-d h:i:s',time()),
            'url'       =>"注册成功"
        ];
        Mail::send('email.create', $arr, function($message) use($post){
            $to = [
                $post['email']
            ];
            $message->to($to)->subject("注册成功");
        });
        echo "<script>alert('注册成功');location.href='/login';</script>";
    }
    

    //找回密码视图
    public function findPass1()
    {
        return view('user.findpass');
    }

    //执行找回密码
    public function findPass2(Request $request)
    {
        $uname = $request->input('u');
        $u = UserModel::where(['user_name' => $uname])
            ->orWhere(['email' => $uname])
            ->orWhere(['tel' => $uname])
            ->first();

        // 给该用户发送重置密码邮件
        if ($u) {
            $token = Str::random(32);
            $data = [
                'uid' => $u->id,
                'token' => $token,
                'expire' => time() + 300  //5分钟后失效
            ];
            FindPassModel::create($data);

            // 密码重置链接
            $link = [
                'url' => env('APP_URL') . '/resetpass?token=' . $token
            ];
            Mail::send('email.findpass', $link, function ($message) use($uname) {
            $user = UserModel::where(['user_name' => $uname])->orWhere(['email' => $uname])->orWhere(['tel' => $uname])->first();
                //收件人数组
                $to = [
                    $user['email']
                ];
                $message->to($to)->subject('重置密码');
            });

            $email = $u->email;
            echo "<script>alert('密码重置链接已发送至".$email."');location.href='/login';</script>";
        }
    }

    // 重置密码视图
    public function resetPass1(Request $request)
    {
        //验证token
        $token = $request->input('token');

        if(empty($token)){
            echo "<script>alert('您还没有授权,没有token');location.href='/login';</script>";
        }

        $data = [
            'token' => $token
        ];
        return view('user.resetpass',$data);
    }

    // 重置密码
    public function resetPass2(Request $request)
    {
        $pwd1 = $request->input('pwd1');
        $pwd2 = $request->input('pwd2');
        $resetToken = $request->input('resetToken');

        if($pwd1 != $pwd2){
            echo "<script>alert('密码与确认密码不一致');history.go(-1);</script>";
        }

        $user = FindPassModel::where(['token'=>$resetToken])->orderBy('id','desc')->first();
        if(empty($resetToken)){
            echo "<script>alert('您还没有授权,没有token');location.href='/login';</script>";
        }

        if($user->expire < time() ){
            echo "<script>alert('token已过期');location.href='/login';</script>";
        }

        if($user->status==1){
            echo "<script>alert('token已被使用');location.href='/login';</script>";
        }

        $uid = $user->uid;
        $pwd = password_hash($pwd1,PASSWORD_BCRYPT);
        // 修改密码
        UserModel::where(['id'=>$uid])->update(['pass'=>$pwd]);

        
        FindpassModel::where(['token'=>$resetToken])->update(['status'=>1]);


        $userInfo = FindPassModel::join('p_users','uid','=','p_users.id')->where(['token'=>$resetToken])->first()->toArray();

        $url = [
            'user_name' => $userInfo['user_name'],
            'time'      => date('Y-m-d h:i:s'),
            'ip'        => $_SERVER['REMOTE_ADDR'],
        ];
        Mail::send('email.resetpass', $url, function ($message) use($userInfo) {
            $to = [
                $userInfo['email']
            ];

            $message->to($to)->subject("密码重置成功");
        });
        echo "<script>alert('密码重置成功,邮件已发送至您的邮箱请注意查收');location.href='/login';</script>";

        
    }


    /**
        * 修改密码 view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vChangePass()
    {
        // TODO 判断登录
        return view('user.changepass');
    }

    /**
        * 修改密码逻辑
     */
    public function changePass(){
        //TODO fix bug

        $post = request()->except('_token');
        $oldpwd = $post['oldpwd'];
        $newspwd = $post['newspwd'];
        $newpwd = $post['newpwd'];
        if(empty($oldpwd)){
            echo "请输入当前密码";die;
        }
        if(empty($newpwd)){
            echo "请输入新密码";die;
        }
        if(empty($newspwd)){
            echo "请确认新密码";die;
        }
        if($oldpwd == $newpwd){
            echo "新密码和当前使用密码不能一致";die;
        }
        if($newpwd != $newspwd){
            echo "确认密码和最新密码不一致";die;
        }
        $where = [$oid =>$oid];
        $res = $Org->where($where)->update($post);
        if($res){
            echo "密码修改成功";die;
        }

    }
}

