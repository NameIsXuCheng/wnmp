<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function index(Request $request)
    {
        $aliases = $request->param('aliases');
        if(!empty($aliases)){
            $where['g_name|g_aliases'] = ['like',"%".$aliases."%"];
        }

//        var_dump($aliases);die();
        $g_type_all = Db::table('g_games_type')->select();
        $g_type = array_column($g_type_all,'id');

        $type = empty($request->param('type'))?$g_type:[$request->param('type')];
        $where["g_type_id"] = ['in',$type];

        $games = Db::table('g_games')->where($where)->order("id desc")->limit(0,10)->select();

        $title = '首页';
        $this -> assign('title', $title);
        $this -> assign('list', $games);
        $this -> assign('g_type', $g_type_all);
        return view();
    }
    public function index_do(){
        return json(1111);
    }
}
