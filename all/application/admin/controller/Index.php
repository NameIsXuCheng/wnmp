<?php
/**
 * Created by PhpStorm.
 * User: matao
 * Date: 2018/8/10
 * Time: 11:08
 */

namespace app\admin\controller;


use app\admin\model\Login;
use think\Request;

class Index extends Base {
    public function index(){
        return view();
    }

    public function login(Request $request){
        $user_name = trim($request->param('user'));
        $pwd = trim($request->param('pwd'));
        $yzm = trim($request->param('yzm'));

       $user = new Login();
       $res = $user->isLogin($user_name,$pwd,$yzm);
        $data = [];
       switch ($res){
           case 0:
               $data = ['code'=>0,'data'=>'验证码错误','yzm'=>$yzm];
               break;
           case 1:
               $data = ['code'=>1,'data'=>'登陆成功'];
               break;
           case 2:
               $data = ['code'=>0,'data'=>'用户名或密码错误'];
               break;
       }
       return json($data);
    }

    public function login_out(){
        session_unset();
        return view('index/index');
    }
}