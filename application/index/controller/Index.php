<?php

/**
 * Created by PhpStorm.
 * User: wqz19970129
 * Date: 2018/5/13
 * Time: 23:20
 */
namespace app\index\controller;
class Index extends \think\Controller
{
     public function index(){
         return view('test/index');
     }
}