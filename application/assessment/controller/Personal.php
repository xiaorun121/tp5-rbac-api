<?php

namespace app\assessment\controller;
use think\Controller;
use think\Db;
use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\Organization;
use app\assessment\model\Personal as PersonalModel;
use app\assessment\model\PersonnelToCompany;

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

    // 员工信息公司维护
    public function usersToCompany(){
        $personnelToCompany = new PersonnelToCompany();
        $info = $personnelToCompany->order('sort asc')->paginate(20,false,[
                  'type'     => 'bootstrap',
                  'var_page' => 'page',
        ]);
        $this->assign('info',$info);

        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);
        return view();
    }

    // 员工信息公司维护更新
    public function usersToCompanySave($id = 0, $name = '', $status = '', $sort = 0){
        $personnelToCompany = new PersonnelToCompany();
        if(request()->isPost()){
            if($id != 0){
                $personnelToCompany = $personnelToCompany::get($id);
            }
            $data = input('post.');
            $data['user_id'] = session('user.id');

            if($personnelToCompany->save($data) == 1){
                return success('保存成功',url('usersToCompany'));
            }
        }else{
            $data = [
                'id'     => $id,
                'name'     => $name,
                'status'     => $status,
                'sort'         => $sort
            ];
            $this->assign('info',$data);
            return view();
        }
    }

    public function delUsersToCompany(){
        $id = input('post.id');

        $personnelToCompany = new PersonnelToCompany();
        $res = $personnelToCompany::destroy($id);
        if($res == 1){
            echo json_encode(['status'=>'success','code'=>200,'msg'=>'删除成功']);
        }else{
            echo json_encode(['status'=>'error','code'=>201,'msg'=>'删除失败']);
        }
    }
}
