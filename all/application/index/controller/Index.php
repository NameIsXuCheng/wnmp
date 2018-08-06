<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $games = Db::table('g_games')->select();
        $order = 'ceshi';
        $this -> assign('title', $order);
        $this -> assign('list', $games);
        return view();
    }
}
