<?php
/**
 * Created by PhpStorm.
 * User: matao
 * Date: 2018/8/24
 * Time: 13:57
 */

namespace app\admin\controller;


use think\Controller;

class Validate extends Controller{
    public function change_pwd(){
        $data = ['data'=>'1111'];
        return json($data);
    }
}