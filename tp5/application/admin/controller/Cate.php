<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Loader;
use app\admin\model\Cate as CateModel;
class Cate extends Controller{
    public function lst(){
        $list = CateModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function  add(){
        if(request()->isPost()){
            $data = [
                'catename' => input('catename'),
            ];
            $validate =  Loader::validate('Cate');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            if(Db::name('cate')->insert($data)) {
                return $this->success('添加栏目成功', 'lst');
            }else{
                return $this->error('添加失败');
            }
        }
        return $this->fetch();
    }
    public function edit(){
        if(request()->isPost()){
            $data = [
                'id'=>input('id'),
                'catename' => input('catename'),
            ];
            $validate =  Loader::validate('Cate');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $save = db('cate')->update($data);
            if($save!==false){
                $this->success('修改栏目成功','lst');
            }else{
                $this->error('修改失败');
            }
        }
        $id = input('id');
        $cate=db('Cate')->find($id);
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    public function del(){
        $id=input('id');
            if (db('Cate')->delete($id)){
                $this->success('删除成功','lst');
            }else{
                $this->error('删除失败');
            }
    }

}
