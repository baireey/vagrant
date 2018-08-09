<?php
namespace app\admin\validate;
use think\Validate;
class Article extends Validate
{
    protected $rule = [
        'title'  =>  'require',
        'cateid' =>  'require',
    ];

    protected $message  =   [
        'title.require' => '文章标题必须填写',
        'cateid.require' => '请选择文章所属栏目',

    ];

    protected $scene = [
        'add'  =>  ['title','cateid'],
        'edit'  =>  ['title','cateid'],
    ];

}
