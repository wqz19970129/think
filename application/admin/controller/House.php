<?php
/**
 * Created by PhpStorm.
 * User: wqz19970129
 * Date: 2018/5/16
 * Time: 16:12
 */

namespace app\admin\controller;


use think\Db;

class House extends Admin
{
    public function index(){
        $list=Db::table('twothink_document')->where('category_id',47)->select();
        //var_dump($list);die;
        $this->assign('list', $list);
        $this->assign('meta_title' , '导航管理');
        return $this->fetch('index');
    }
    public function add(){
        if(request()->isPost()){
            $house = model('house');
            $post_data=\think\Request::instance()->post();//提交的数据
            //var_dump($post_data);die;
            //自动验证
            $validate = validate('house');
            //var_dump($validate->check($post_data));die;
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            //$data=$house->create($post_data);
            $data=Db::table('twothink_document')->insert($post_data);
            //var_dump($data);die;
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_house', 'house', $data->id, UID);
            } else {
                $this->error($house->getError());
            }
        } else {
            $parent = \think\Db::name('document')->find();
            $this->assign('parent', $parent);
            $this->assign('info',null);
            $this->assign('meta_title', '新增保修');
            return $this->fetch('edit');
        }
    }

    //修改
    public function edit($id = 0){
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $guarantee = \think\Db::name("document");
            $data = $guarantee->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('document')->find($id);
            //var_dump($info);die;
            if(false === $info){
                $this->error('获取配置信息错误');
            }
            $parent = \think\Db::name('document')->field('title')->find();
            $this->assign('parent', $parent);
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            return $this->fetch();
        }
    }
}