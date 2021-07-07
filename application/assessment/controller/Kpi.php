<?php
namespace app\assessment\controller;

use app\assessment\model\Kpi as KpiModel;
use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\KpiDepartmentQuota;
use app\assessment\model\KpiAssessment;
use app\assessment\model\EvaluationCycle;
use app\assessment\model\Organization;

// kpi
class Kpi extends Common{

    // kpi 部门列表
    public function kpiDepartmentList(){
        $organization = new Organization();
        $name = input('get.name');
        if($name){

            $info = $organization->where('name','like','%'.$name.'%')
                        ->where('kpi_department','=','是')
                        ->where('status','=','启用')
                        ->order('code asc')
                        ->paginate(20,false,[
                        'type'     => 'bootstrap',
                        'var_page' => 'page',
            ]);

        }else{

            $info = $organization->where('kpi_department','=','是')
                        ->where('status','=','启用')
                        ->order('code asc')
                        ->paginate(20,false,[
                        'type'     => 'bootstrap',
                        'var_page' => 'page',
            ]);
        }


        $this->assign('name',$name);
        $this->assign('info',$info);

        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);

        //  获取当前以前的考核年份
        $toDate = date('Y');
        $evaluation_cycle = new EvaluationCycle();
        $evaluation_cycle_info = $evaluation_cycle->where('evaluation_cycle','<=',$toDate)->order('evaluation_cycle desc')->select();
        $this->assign('evaluation_cycle_info',$evaluation_cycle_info);

        $arr = [];
        for($i=1;$i<=12;$i++){
            $arr[$i]['month'] = ($i < 10) ? '0'.$i : $i;
        }
        $this->assign('month',$arr);
        return view();
    }


    // kpi 考核
    public function kpiAssessment(){
        $data['department_name']   = input('get.department_name');
        $data['kpi_department_id'] = input('get.kpi_department_id');
        $data['responsible']       = input('get.responsible');
        $data['evaluation_cycle']  = input('get.evaluation_cycle');
        $data['month']             = input('get.month');
        $this->assign('info',$data);

        // KPI指标部分（占比80％）
        $kpiDepartmentQuota = new KpiDepartmentQuota();
        $kpiDepartmentQuotaInfo = $kpiDepartmentQuota->where('kpi_department_id',input('get.kpi_department_id'))->order('sort asc')->select();
        $this->assign('kpiDepartmentQuotaInfo',$kpiDepartmentQuotaInfo);

        $kpiAssessment     = new KpiAssessment();
        $kpiAssessmentInfo = $kpiAssessment->where('kpi_department_id',input('get.kpi_department_id'))->where('evaluation_cycle',input('get.evaluation_cycle').'-'.input('get.month'))->field('quota,quotaqywh,quotatdgl,quotazwxx,kpiwc,glyx,jjfx,kpfhj,bkhbmfzrqz,kpwyqz,zcqz')->find();
        $kpiAssessmentQuotaInfo = json_decode($kpiAssessmentInfo['quota'],true);
        $kpiAssessmentQuotaQYWHInfo = json_decode($kpiAssessmentInfo['quotaqywh'],true);
        $kpiAssessmentQuotaTDGLInfo = json_decode($kpiAssessmentInfo['quotatdgl'],true);
        $kpiAssessmentQuotaZWXXInfo = json_decode($kpiAssessmentInfo['quotazwxx'],true);

        $this->assign('kpiAssessmentQuotaInfo',$kpiAssessmentQuotaInfo);                          // KPI指标部分（占比80％）
        $this->assign('kpiAssessmentQuotaQYWHInfo',$kpiAssessmentQuotaQYWHInfo);                  // 企业文化
        $this->assign('kpiAssessmentQuotaTDGLInfo',$kpiAssessmentQuotaTDGLInfo);                  // 团队管理
        $this->assign('kpiAssessmentQuotaZWXXInfo',$kpiAssessmentQuotaZWXXInfo);                  // 自我学习
        $this->assign('kpiAssessmentQuotaKPIWCInfo',$kpiAssessmentInfo['kpiwc']);                 // kpi完成
        $this->assign('kpiAssessmentQuotaGLYXInfo',$kpiAssessmentInfo['glyx']);                   // 管理要项
        $this->assign('kpiAssessmentQuotaJJFXInfo',$kpiAssessmentInfo['jjfx']);                   // 加减分项
        $this->assign('kpiAssessmentQuotaKPFHJInfo',$kpiAssessmentInfo['kpfhj']);                 // 考评分合计
        $this->assign('kpiAssessmentQuotaBKHBMFZRQZInfo',$kpiAssessmentInfo['bkhbmfzrqz']);       // 被考核部门负责人签字
        $this->assign('kpiAssessmentQuotaKPWYQZInfo',$kpiAssessmentInfo['kpwyqz']);               // 考评委员签字
        $this->assign('kpiAssessmentQuotaZCQZInfo',$kpiAssessmentInfo['zcqz']);                   // 总裁签字
        return view();
    }

    // kpi 考核 保存数据
    public function kpiAssessmentSave(){
        if(request()->isPost()){
            $kpiassessment = new KpiAssessment();

            $res = $kpiassessment->where([
                                    'department'        => input('post.department'),
                                    'responsible'       => input('post.responsible'),
                                    'evaluation_cycle'  => input('post.evaluation_cycle'),
                                    'kpi_department_id' => input('post.kpi_department_id'),
                                ])
                                ->find();

            if(!empty($res)){
                $kpiassessment = $kpiassessment::get($res['id']);
            }

            $data = [
                'quota'             => json_encode(input('post.quota/a')),    //  /a 接收的变量强制转换成数组
                'quotaqywh'         => json_encode(input('post.quotaqywh/a')),
                'quotatdgl'         => json_encode(input('post.quotatdgl/a')),
                'quotazwxx'         => json_encode(input('post.quotazwxx/a')),
                'kpiwc'             => input('post.kpiwc'),
                'kpfhj'             => input('post.kpfhj'),
                'bkhbmfzrqz'        => input('post.bkhbmfzrqz'),
                'kpwyqz'            => input('post.kpwyqz'),
                'zcqz'              => input('post.zcqz'),
                'glyx'              => input('post.glyx'),
                'jjfx'              => input('post.jjfx'),
                'department'        => input('post.department'),
                'responsible'       => input('post.responsible'),
                'evaluation_cycle'  => input('post.evaluation_cycle'),
                'kpi_department_id' => input('post.kpi_department_id'),
                'user_id'           => session('user.id'),
            ];

            if($kpiassessment->save($data) == 1){
                return success('保存成功',url('kpiDepartmentList'));
            }else{
                return error('保存失败');
            }
        }
    }

    // kpi 部门指标维护列表
    public function kpiDepartmentQuotaList(){

        $kpiDQ = new KpiDepartmentQuota();
        $name              = input('get.name');
        $kpi_department_id = input('get.kpi_department_id');

        if(!empty($name) && $kpi_department_id == 0){
            $info = $kpiDQ->where('name','like','%'.$name.'%')
                          ->order('sort asc')
                          ->paginate(20,false,[
                          'type'     => 'bootstrap',
                          'var_page' => 'page',
            ]);

        }elseif($kpi_department_id > 0 && empty($name)){
            $info = $kpiDQ->where('kpi_department_id',$kpi_department_id)
                          ->order('sort asc')
                          ->paginate(20,false,[
                          'type'     => 'bootstrap',
                          'var_page' => 'page',
            ]);

        }elseif(!empty($name) && $kpi_department_id > 0){
            $info = $kpiDQ->where('name','like','%'.$name.'%')
                          ->where('kpi_department_id',$kpi_department_id)
                          ->order('sort asc')
                          ->paginate(20,false,[
                          'type'     => 'bootstrap',
                          'var_page' => 'page',
            ]);

        }else{

            $info = $kpiDQ->order('sort asc')
                        ->paginate(20,false,[
                        'type'     => 'bootstrap',
                        'var_page' => 'page',
            ]);
        }


        $this->assign('kpi_department_id',$kpi_department_id);
        $this->assign('name',$name);
        $this->assign('info',$info);

        $organization = new Organization();
        $kpiDepartment = $organization->where('kpi_department','=','是')
                    ->order('code asc')->field('id,name')->select();
        $this->assign('kpiDepartment',$kpiDepartment);

        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);

        // 考核年份
        // ① 保存考核年份数据信息
        // $evaluation_cycle_start = '2021';
        // $arr = [];
        // for($i=0;$i<=100;$i++){
        //     $arr[$i]['evaluation_cycle'] = $evaluation_cycle_start + $i;
        // }
        // $evaluation_cycle = new EvaluationCycle();
        // $evaluation_cycle->saveAll($arr);


        return view();
    }

    // kpi 部门指标保存
    public function kpiDepartmentQuotaSave($id = 0,$name = '',$description = '',$sort = 0,$kpi_department_id = 0,$weight = ''){
        $kpiDQ = new KpiDepartmentQuota();
        if(request()->isPost()){

            if($id != 0){
                $kpiDQ = $kpiDQ::get($id);
            }
            $data['name']              = input('post.name');
            $data['description']       = input('post.description');
            $data['sort']              = input('post.sort');
            $data['user_id']           = session('user.id');
            $data['kpi_department_id'] = input('post.kpi_department_id');
            $data['weight']            = input('post.weight');

            if($kpiDQ->save($data) == 1){
                return success('保存成功',url('kpiDepartmentQuotaList'));
            }

        }else{
            $data = [
                'id'                => $id,
                'name'              => $name,
                'description'       => $description,
                'sort'              => $sort,
                'kpi_department_id' => $kpi_department_id,
                'weight'            => $weight,
            ];
            $this->assign('getInfo',$data);

            $organization = new Organization();
            $info = $organization->where('kpi_department','=','是')
                        ->order('code asc')
                        ->select();
            $this->assign('info',$info);

            return view();
        }
    }

    // kpi 部门指标删除
    public function delKpiDepartmentQuota(){
        $id = input('post.id');

        $kpi = new KpiDepartmentQuota();
        $res = $kpi::destroy($id);
        if($res == 1){
            echo json_encode(['status'=>'success','code'=>200,'msg'=>'删除成功']);
        }else{
            echo json_encode(['status'=>'error','code'=>201,'msg'=>'删除失败']);
        }
    }

}
