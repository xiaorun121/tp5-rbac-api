<?php

namespace app\assessment\controller;
use think\Controller;
use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\Personnel as PersonnelModel;

// 员工管理
class Personnel extends Common{

    public function personnelList(){


        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);
        return view();
    }


    public function personnelSave(){
        return view();
    }


    public function delPersonnel(){
        $id = input('post.id');

        $personnel = new PersonnelModel();
        $res = $personnel::destroy($id);
        if($res == 1){
            echo json_encode(['status'=>'success','code'=>200,'msg'=>'删除成功']);
        }else{
            echo json_encode(['status'=>'error','code'=>201,'msg'=>'删除失败']);
        }
    }
}
