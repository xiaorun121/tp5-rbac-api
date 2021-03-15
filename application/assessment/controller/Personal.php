<?php

namespace app\assessment\controller;
use think\Controller;
use think\Db;
use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\Organization;
use app\assessment\model\Personal as PersonalModel;

// 人事管理
class Personal extends Common{

    // 入职
    public function Enpty(){

        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);
        return view();
    }

    // 保存入职信息
    public function saveEnpty(){

        // 公司
        $organization = new Organization();
        $organizationInfo = $organization->where('char_length(code) = 2')->order('code asc')->select();
        $this->assign('organizationInfo',$organizationInfo);

        // 发薪区域
        $fxqyInfo = Db::query('select distinct name from uvclinic_city_view');
        $this->assign('fxqyInfo',$fxqyInfo);
        return view();
    }

    // 转正
    public function Become(){
        return view();
    }

    // 调岗
    public function Transfer(){
        return view();
    }

    // 离职
    public function Leave(){
        return view();
    }
}
