<?php

namespace app\assessment\controller;
use think\Controller;
use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\Personnel as PersonnelModel;
use app\assessment\model\PersonnelToCompany;
use app\assessment\model\Position;
use think\Db;

// 员工管理
class Personnel extends Common{

    public function personnelList(){
        $personnel = new PersonnelModel();

        $name = input('get.name');
        $code = input('get.code');

        if($name){

            $info = $personnel->where('name','like','%'.$name.'%')->paginate(100,false,[
                    'type'     => 'bootstrap',
                    'var_page' => 'page',
            ]);

        }else if($code){

            $info = $personnel->where('code','like','%'.$code.'%')->paginate(100,false,[
                    'type'     => 'bootstrap',
                    'var_page' => 'page',
            ]);

        } else if(!empty($name) && !empty($code)){

            $info = $personnel->where('code','like','%'.$code.'%')->where('name','like','%'.$name.'%')->paginate(100,false,[
                    'type'     => 'bootstrap',
                    'var_page' => 'page',
            ]);
        }else{
            $info = $personnel->paginate(100,false,[
                    'type'     => 'bootstrap',
                    'var_page' => 'page',
            ]);
        }

        $this->assign('info',$info);

        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);
        return view();
    }


    public function personnelSave($id = 0){
        $personnel = new PersonnelModel();
        if(request()->isPost()){
            if($id != 0){
                $personnel = $personnel::get($id);
            }
            $data = input('post.');
            $data['user_id'] = session('user.id');

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
            $position = new Position();
            $positionInfo = $position->where('status','=','启用')->field('id,code,name,organization_code')->select();
            $this->assign('positionInfo',$positionInfo);

            // 发薪区域
            $fxqyInfo = Db::query('select distinct name from uvclinic_city_view');
            $this->assign('fxqyInfo',$fxqyInfo);

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
