<?php
/**
 * Created by PhpStorm.
 * User: matao
 * Date: 2018/8/10
 * Time: 14:11
 */

namespace app\admin\controller;

use think\Db;

class User extends Base {
    public function index(){
        return view();
    }

    public function head(){
        return view();
    }

    public function left(){
        $left = Db::name('g_powers')->where(['power'=>['ELT',session('login_power')]])->select();
        $data = array();
        foreach ($left as $k => $val){//父级权限名称
            if($val['parent_id'] == 0){
                $data[$k]['id'] = $val['id'];
                $data[$k]['name'] = $val['name'];
            }
        }
        foreach ($left as $k => $val){
            foreach ($data as $j=>$info){
                if($info['id'] == $val['parent_id']){
                    $data[$j]['child'][$val['id']]['url']=$val['url'];
                    $data[$j]['child'][$val['id']]['name']=$val['name'];
                }
            }
        }
        $this->assign('data',$data);
        return view();
    }

    public function main(){
        return view();
    }

    public function info(){
        $id = session('login_id');
        $info = Db::name('g_user')->where(['id'=>$id])->find();
        $this->assign('info',$info);
        return view();
    }
}