<?php
/**
 * Created by PhpStorm.
 * User: matao
 * Date: 2018/8/10
 * Time: 11:14
 */

namespace app\admin\model;


use think\Db;
use think\Model;
use think\Session;

class User extends Model{
    protected $table = 'g_user';

    public function isLogin($name,$pwd)
    {
        $user = Db::table($this->table)->where(['user_name'=>$name,'password'=>$pwd])->find();
        if($user){
            $this->setSeesion($user);
            return true;
        }
        return false;
    }

    public function setSeesion($data){
        Session::set('name',$data['user_name']);
        Session::set('power',$data['power']);
    }
}