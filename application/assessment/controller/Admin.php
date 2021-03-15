<?php
namespace app\assessment\controller;

use think\Controller;
use app\assessment\model\Role;
use app\assessment\model\User;
use app\assessment\model\Menu;
use app\assessment\model\Website;

class Admin extends Common{

    public function website(){

        if(request()->isPost()){
            $con                 = Website::get(1);
            $data['name']        = input('post.name');
            $data['url']         = input('post.url');
            $data['title']       = input('post.title');
            $data['keywords']    = input('post.keywords');
            $data['description'] = input('post.description');
            $data['copyright']   = input('post.copyright');

            if($con->save($data) == 1){
                return success('保存成功',url('website'));
            }

        }
        else{
            $info = Website::get(1);
            // $info = $con->where('id',1)->find();
            $this->assign('info',$info);
        }
        return view();
    }

}

?>
