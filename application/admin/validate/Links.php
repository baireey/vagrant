<?php
/**
 * _ooOoo_
 * o8888888o
 * 88" . "88
 * (| -_- |)
 *  O\ = /O
 * ___/`---'\____
 * .   ' \\| |// `.
 * / \\||| : |||// \
 * / _||||| -:- |||||- \
 * | | \\\ - /// | |
 * | \_| ''\---/'' | |
 * \ .-\__ `-` ___/-. /
 * ___`. .' /--.--\ `. . __
 * ."" '< `.___\_<|>_/___.' >'"".
 * | | : `- \`.;`\ _ /`;.`/ - ` : | |
 * \ \ `-. \_ __\ /__ _/ .-` / /
 * ======`-.____`-.___\_____/___.-`____.-'======
 * `=---='
 *          .............................................
 *           佛曰：bug泛滥，我已瘫痪！
 */
namespace app\admin\validate;
use think\Validate;
class Links extends Validate{
    protected $rule = [
        'title' => 'require',
        'url' => 'require',
        'desc' => 'require'
    ];
    protected $message = [
        'title.require' => '链接名必须填写',
        'url.require' => '链接地址必须填写',
        'desc.require' => '链接说明必须填写'
    ];
    protected $scene = [
        'add' => ['title'=>'require','url'=>'require','desc'=>'require'],
        'edit' => ['title'=>'require','url'=>'require','desc'=>'require']
    ];
}
