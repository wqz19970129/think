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
    protected $rule = [
        ['name', 'require', '姓名不能为空'],
        ['tel', 'require', '电话不能为空'],
        ['address', 'require', 'address不能为空'],
    ];
}