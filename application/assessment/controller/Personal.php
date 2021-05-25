<?php

namespace app\assessment\controller;
use think\Controller;
use think\Db;
use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\Organization;
use app\assessment\model\Personal as PersonalModel;
use app\assessment\model\Personnel;
use app\assessment\model\PersonnelToCompany;
use app\assessment\model\Position;

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
    public function saveEnpty($id = 0){

      $personnel = new Personnel();
      $position = new Position();
      if(request()->isPost()){
          if($id != 0){
              $personnel = $personnel::get($id);
          }
          $data = input('post.');
          $data['user_id']  = session('user.id');
          $data['position'] = $position->where('code',input('post.position_id'))->value('name');

          if($personnel->save($data) == 1){
              return success('保存成功',url('personnelList'));
          }else{
              return error('请更新数据！');
          }
      }else{
          // 公司
          $personnelToCompany = new PersonnelToCompany();
          $personnelToCompanyInfo = $personnelToCompany->where('status','=','启用')->order('sort asc')->select();
          $this->assign('personnelToCompanyInfo',$personnelToCompanyInfo);

          // 部门
          $positionInfo = $position->where('status','=','启用')->field('id,code,name,organization_code')->select();
          $this->assign('positionInfo',$positionInfo);

          // 发薪区域
          $fxqyInfo = Db::query('select distinct name from uvclinic_city_view');
          $this->assign('fxqyInfo',$fxqyInfo);

          // 汇报人
          $personnelToName = $personnel->field('code,name')->order('code asc')->select();
          $this->assign('personnelToName',$personnelToName);

          $info = $personnel->where('id',$id)->find();
          $this->assign('info',$info);
          return view();
      }
    }

    // 根据职位获取部门信息
    public function getDepartment(){
        if(request()->isPost()){
            $id = input('post.id');
            $info = Db::name('position')->alias('p')->join('organization o','o.code = p.organization_code')->where('p.id','=',$id)->field('p.id,p.code,p.organization_code,o.name')->find();
            if($info){
                echo json_encode(['code'=>200,'status'=>'success','data'=>$info]);
            }else{
                echo json_encode(['code'=>500,'status'=>'error']);
            }
        }
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
