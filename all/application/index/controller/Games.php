<?php
/**
 * Created by PhpStorm.
 * User: matao
 * Date: 2018/8/6
 * Time: 14:28
 */

namespace app\index\controller;


use think\Controller;
use think\Request;

class Games extends Controller{
    public function games(Request $request){
        $game_id = $request->param('id');
        var_dump($game_id);
        return view();
    }
}