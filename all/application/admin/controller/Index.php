<?php
/**
 * Created by PhpStorm.
 * User: matao
 * Date: 2018/8/10
 * Time: 11:08
 */

namespace app\admin\controller;


use app\admin\model\User;
use think\Controller;
use think\Request;

class Index extends Base {
    public function index(){
        return view();
    }

    public function login(Request $request){
        $user_name = $request->param('user');
        $pwd = $request->param('pwd');
       $user = new User();

       $res = $user->isLogin($user_name,$pwd);
       if ($res){
           return json(['code'=>1,'data'=>'登陆成功']);
       }
       return json(['code'=>0,'data'=>'用户名或密码错误']);
    }

}