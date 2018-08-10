<?php
/**
 * Created by PhpStorm.
 * User: matao
 * Date: 2018/8/6
 * Time: 14:28
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Games extends Controller{
    public function games(Request $request){
        $game_id = $request->param('id');

        $game_info  = Db::table('g_games')->where(['id'=>$game_id])->find();

        $g_type_all = Db::table('g_games_type')->select();
//        var_dump($game_info);
        $this->assign('game_info',$game_info);
        $this -> assign('g_type', $g_type_all);
        return view();
    }
}