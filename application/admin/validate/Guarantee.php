<?php
/**
 * Created by PhpStorm.
 * User: wqz19970129
 * Date: 2018/5/13
 * Time: 12:31
 */

namespace app\admin\validate;


use think\Validate;

class Guarantee extends Validate
{
    protected $rule =
        ['name'=>'require|max:25',
        'tel'=>['require','max'=>11,'number','regex'=>'/^1[3-8]{1}[0-9]{9}$/'] ,
        'address'=> 'require',
        'title'=> 'require',
    ];
    protected $message=[
       'name.require'  =>'姓名不能为空',
        'tel.require'=>'电话不能为空',
        'address.require'=>'address不能为空',
        'title.require'=>'标题不能为空',
        'tel.regex'=>'验证规则不对',
        'tel.number'=>'不为数字',
    ];
}