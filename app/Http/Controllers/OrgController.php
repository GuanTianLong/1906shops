<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Org;

class OrgController extends Controller
{
    //页面
    public function change_pass(){
        return view('org.index');
    }
    //修改方法
    public function upd(){
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
