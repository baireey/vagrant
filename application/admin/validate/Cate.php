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
class Cate extends Validate
{
    protected $rule = [
        'catename'  =>  'require|unique:cate',
    ];

    protected $message  =   [
        'catename.require' => '栏目名称必须填写',
        'catename.unique' => '栏目名称不得重复',

    ];

    protected $scene = [
        'add'  =>  ['catename'=>'require|unique:cate'],
        'edit'  =>  ['catename'=>'require|unique:cate'],
    ];




}