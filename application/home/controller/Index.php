<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace app\home\controller;
use app\home\model\Document;
use OT\DataDictionary;
use think\Config;
use think\Db;
use think\Request;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class Index extends Home{

	//系统首页
    public function index(){
        $category = model('Category')->getTree();
        $document = new Document();
        $lists    = $document->lists(null);
        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('page',model('Document')->page);//分页

        return $this->fetch();
    }
     //在线保修
    public function zxbx(){
        return $this->fetch('online');
    }
    public function store(){
        if(request()->isPost()){
            //$base=new Base();
            //var_dump($base);die;
            if(is_login()){
                //dump(input('post.'));die;
                $post_data=\think\Request::instance()->post();//提交的数据
                //var_dump($post_data);die;
//                $data=Request::instance()->port();
                $validate = validate('guarantee');
                //var_dump($validate->check($post_data));die;
                if(!$validate->check($post_data)){
                    return $this->error($validate->getError());
                }
                if(Db('guarantee') -> insert($post_data)){        //添加数据
                    return $this->success('添加成功','index'); //成功后跳转  lst 界面
                }else{
                    return $this->error('保修失败');
                }
                return;
            }else{
                $this->error( '您还没有登陆',url('User/login') );
            }

        }else{
            return $this->fetch('online');
        }
    }
    //判断是否登录
    public function user(){
        if ( !is_login() ) {
            $this->error( '您还没有登陆',url('/user/login') );
        }
        return  $this->fetch('my');
    }
       //服务
    public function service(){
        return $this->fetch('fuwu');
    }
    //发现
    public function find(){
        return $this->fetch('faxian');
    }
    //保修
    public function guarantee(){
        $id=is_login();
        //var_dump($id);die;
        $list1=Db::table('twothink_ucenter_member')->where('id',$id)->find();
        $name=$list1['username'];
        //var_dump($name);die;
        $list=Db::table('twothink_guarantee')->where('name',$name)->select();
        //var_dump($list);die;
        $this->assign('list', $list);
        $this->assign('list1', $list1);
        $this->assign('meta_title' , '导航管理');
        return $this->fetch('guarantee');
    }
       //租售
    public function zushou(){
        $category = $this->category();
        $list=Db::table('twothink_document')->where('category_id',$category['id'])->select();
        //
//        var_dump($list);die;
        $row=[];
        $value=[];
        foreach ($list as $v){
            //var_dump($v['cover_id']);die;
            $val=Db::table('twothink_picture')->where('id',$v['cover_id'])->value('path');
            //var_dump($val);die;
            $a=Db::table('twothink_document')->where('zs','租')->select();
            foreach ($a as&$as){
                $as['cover_id']=$val;
                //var_dump($as['cover_id']);die;
            }
            $b=Db::table('twothink_document')->where('zs','售')->select();
            foreach ($b as&$bs){
                $bs['cover_id']=$val;
            }

            //var_dump($a);die;
            $row=$row+$a;
            $value=$value+$b;
        }
        //var_dump($row);die;
        //var_dump($value);die;
        $this->assign('row', $row);
        $this->assign('value', $value);
        return $this->fetch('zushou');
    }

    public function getone($id){
        $category = $this->category();
        $list=Db::table('twothink_document')->where('id',$id)->find();
        //var_dump($list['cover_id']);die;
            //var_dump($v);die;
            $val=Db::table('twothink_picture')->where('id',$list['cover_id'])->value('path');
            //var_dump($val);die;
            $list['cover_id']=$val;
            //var_dump($v->cover_id);die;
        //var_dump($list);die;
        $this->assign('list', $list);
        return $this->fetch('zushou-detail');
    }

    /* 文档分类检测 */
    private function category($id = 0){
        /* 标识正确性检测 */
        $id = $id ? $id : input('param.category',0);
        if(empty($id)){
            $this->error('没有指定文档分类！');
        }

        /* 获取分类信息 */
        $category = model('Category')->info($id);
        if($category && 1 == $category['status']){
            switch ($category['display']) {
                case 0:
                    $this->error('该分类禁止显示！');
                    break;
                //TODO: 更多分类显示状态判断
                default:
                    return $category;
            }
        } else {
            $this->error('分类不存在或被禁用！');
        }
    }

}
