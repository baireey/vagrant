<?php
namespace app\admin\controller;
use think\Controller;
class Index extends  Controller{
    public function index(){
        if(!session('username')){
            $this->error('未登录','login/index',2);
        }
        return $this->fetch();
    }
}

