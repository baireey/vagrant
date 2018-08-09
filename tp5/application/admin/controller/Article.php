<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Loader;
use app\admin\model\Article as ArticleModel;
class Article extends Controller{
    public function lst(){
        $list = ArticleModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function  add(){
        if(request()->isPost()){

            $data = [
                'title'=>input('title'),
                'author'=>input('author'),
                'desc'=>input('desc'),
                'keywords'=>str_replace('，', ',', input('keywords')),
                'content'=>input('content'),
                'cateid'=>input('cateid'),
                'time'=>time(),
            ];
            if(input('state')=='on'){
                $data['state']=1;
            }
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic']='/uploads/'.$info->getSaveName();
            }
            $validate =  Loader::validate('Article');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            if(Db::name('article')->insert($data)) {
                return $this->success('添加管理员成功', 'lst');
            }else{
                return $this->error('添加失败');
            }
        }
        $cateres=Db::name('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }
    public function edit(){
        $id = input('id');
        $articles=db('article')->find($id);
        if(request()->isPost()){
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author'=>input('author'),
                'desc'=>input('desc'),
                'keywords'=>str_replace('，', ',', input('keywords')),
                'content'=>input('content'),
                'cateid'=>input('cateid'),
            ];
            if(input('state')=='on'){
                $data['state']=1;
            }else{
                $data['state']=0;
            }
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic']='/uploads/'.$info->getSaveName();
              

            }
            $validate = \think\Loader::validate('Article');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError()); die;
            }
            if(db('Article')->update($data)){
                $this->success('修改文章成功！','lst');
            }else{
                $this->error('修改文章失败！');
            }
            return;
        }
        $cateres=Db::name('cate')->select();
        $this->assign('cateres',$cateres);
        $this->assign('articles',$articles);
        return $this->fetch();
    }
    public function del(){
        $id=input('id');
          if(Db::name('article')->delete($id)){
              $this->success('删除成功','lst');
          }else{
              $this->error('删除失败');
          }

        }

}
