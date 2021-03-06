<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Loader;
use app\admin\model\Links as LinksModel;

class Links extends Controller{
    public function lst(){
        $list = LinksModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function  add(){
    if(request()->isPost()){
        $data = [
            'title' => input('title'),
            'url' => input('url'),
            'desc' => input('desc'),
        ];
        $validate =  Loader::validate('Links');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        if(Db::name('Links')->insert($data)) {
            return $this->success('添加链接成功', 'lst');
        }else{
            return $this->error('添加链接失败');
        }
    }
    return $this->fetch();
}
    public function edit(){
        $id = input('id');
        $links=db('Links')->find($id);
        if(request()->isPost()){
            $data = [
                'id'=>input('id'),
                'title' => input('title'),
                'url' => input('url'),
                'desc' => input('desc'),
            ];
            $validate =  Loader::validate('Links');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            if(db('Links')->update($data)){
                $this->success('修改链接成功','lst');
            }else{
                $this->error('修改链接失败');
            }
        }
        $this->assign('links',$links);
        return $this->fetch();
    }
    public function del(){
        $id=input('id');
            if (db('Links')->delete($id)){
                $this->success('删除成功','lst');
            }else{
                $this->error('删除失败');
            }
        }

}
