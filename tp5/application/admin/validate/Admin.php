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
class Admin extends Validate{
    protected $rule = [
      'username' => 'require|unique',
      'password' => 'require'
    ];
    protected $message = [
        'username.require' => '管理员名称必须填写',
        'username.unique' => '管理员名称不得重复',
        'password.require' => '管理员密码必须填写'
    ];
    protected $scene = [
        'add' => ['username'=>'require|unique:admin','password'],
        'edit' => ['username'=>'require']
    ];
}
