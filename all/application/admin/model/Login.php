<?php
/**
 * Created by PhpStorm.
 * User: matao
 * Date: 2018/8/13
 * Time: 13:28
 */

namespace app\admin\model;

use think\Db;
use think\Model;
use think\Session;
use think\Validate;

class Login extends Model{
    public function isLogin($name,$pwd,$yzm)
    {
        $validate = new Validate();
        //检查验证码结果
        if(!$validate->check($yzm)){
            return 0;
        }
//        $salf = Db::table($this->table)->field('salf')->where(['user_name'=>$name])->find();
//        $pwd = md5($pwd.$salf);
        $user = Db::table('g_user')->where(['user_name'=>$name,'password'=>$pwd])->find();
        if($user){
            $this->setSeesion($user);
            return 1;
        }
        return 2;
    }

    public function setSeesion($data){
        Session::set('login_id',$data['id']);
        Session::set('login_name',$data['user_name']);
        Session::set('login_power',$data['power']);
    }
}