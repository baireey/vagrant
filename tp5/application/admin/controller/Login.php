<?php
/**
 * Created by PhpStorm.
 * User: BL
 * Date: 2018-8-1
 * Time: 22:08
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Login extends Controller
{
   public function index(){
       if(request()->isPost()){
           $admin = new Admin();
           $data = input('post.');
           $num = $admin->login($data);
           if($num==3){
               $this->success('信息正确','index/index');
           }elseif($num==4){
               $this->success('验证码错误');
           }else{
               $this->success('用户名或密码错误');
           }
       }
       return $this->fetch('login');
   }
}