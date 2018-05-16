<?php
/**
 * Created by PhpStorm.
 * User: wqz19970129
 * Date: 2018/5/16
 * Time: 16:34
 */

namespace app\admin\validate;


use think\Validate;

class House extends Validate
{
    protected $rule = [
        ['title', 'require', '标题不能为空'],
        ['price', 'require', '价格不能为空'],
        ['address', 'require', '地址不能为空'],
        ['content', 'require', '内容不能为空'],
    ];
}