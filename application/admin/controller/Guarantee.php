<?php
/**
 * Created by PhpStorm.
 * User: wqz19970129
 * Date: 2018/5/13
 * Time: 11:11
 */

namespace app\admin\controller;


use think\Db;

class Guarantee extends Admin
{
       public function index(){
           //$list = \think\Db::name('guarantee')->select();
           $list=Db::table('twothink_guarantee')->select();
           $this->assign('list', $list);
           $this->assign('meta_title' , '导航管理');
           return $this->fetch();
       }
    public function add(){
        if(request()->isPost()){
            $guarantee = model('guarantee');
            $post_data=\think\Request::instance()->post();//提交的数据
            //var_dump($post_data);die;
            //自动验证
            $validate = validate('guarantee');
            //var_dump($validate->check($post_data));die;
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data=$guarantee->create($post_data);
            //var_dump($data);die;
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_guarantee', 'guarantee', $data->id, UID);
            } else {
                $this->error($guarantee->getError());
            }
        } else {
            $parent = \think\Db::name('guarantee')->find();
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
            $guarantee = \think\Db::name("guarantee");
            $data = $guarantee->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('guarantee')->find($id);
      //var_dump($info);die;
            if(false === $info){
                $this->error('获取配置信息错误');
            }
                $parent = \think\Db::name('guarantee')->field('title')->find();
            $this->assign('parent', $parent);
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            return $this->fetch();
        }
    }
    //删除
    public function del(){
        $id = array_unique((array)input('id/a',0));
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );
        if(\think\Db::name('guarantee')->where($map)->delete()){
            //记录行为
            action_log('update_guarantee', 'channel', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}