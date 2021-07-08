<?php

namespace app\assessment\controller;
use app\assessment\model\PersonnelsProperty;
use app\assessment\model\PersonnelsTrain;
use app\assessment\model\PersonnelsUserinfo;
use app\assessment\model\PersonnelsWorkinfo;
use think\cache\driver\Memcache;
use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\Personnel as PersonnelModel;
use app\assessment\model\Personnels;
use app\assessment\model\PersonnelToCompany;
use app\assessment\model\Position;
use app\assessment\model\Organization;
use think\Db;
use think\cache\driver\Redis;
use think\Request;

// 员工管理
class Personnel extends Common{

    public function personnelList(){
        $personnel = new Personnels();


        // 加载mencache扩展
       /* $memcache = new Memcache();

        $memcache_status = $memcache->has("info");
        if($memcache_status==false){
            //缓存失效，重新存入
            //查询数据
            $Info = $personnel->paginate(100,false,[
                'type'     => 'bootstrap',
                'var_page' => 'page',
            ]);
            //转换成字符串，有利于存储
            $mencacheInfo = serialize($Info);
            //存入缓存
            $memcache->set("info",$mencacheInfo);
        }

        //获取缓存
        $result = unserialize($memcache->get("info"));*/

        //加载redis扩展
        $redis = new Redis();

        // redis 里面 可以直接执行的指令有：has() get() set() inc() dec() rm() clear() 这七个
        //$hander = $redis->handler();    // 想使用redis其他方法，则必须使用handler方法之后才能使用其他的redis方法
        //$hander->hset('xiaorun','height',80);
        //echo $hander->hget('xiaorun','height');

        //判断是否过期
//        $redis->rm('info');exit;
        $redis_status = $redis->has("info");
        if($redis_status==false){
            //缓存失效，重新存入
            //查询数据
            $Info = $personnel->paginate(100,false,[
                    'type'     => 'bootstrap',
                    'var_page' => 'page',
            ]);
            //转换成字符串，有利于存储
            $redisInfo = serialize($Info);
            //存入缓存
            $redis->set("info",$redisInfo);
        }



         $name = input('get.name');
         $code = input('get.code');
         if($name){

             $result = $personnel->where('name','like',$name.'%')->paginate(100,false,[
                     'type'     => 'bootstrap',
                     'var_page' => 'page',
             ]);

         }else if($code){

             $result = $personnel->where('code','like',$code.'%')->paginate(100,false,[
                     'type'     => 'bootstrap',
                     'var_page' => 'page',
             ]);

         } else if(!empty($name) && !empty($code)){

             $result = $personnel->where('code','like',$code.'%')->where('name','like',$name.'%')->paginate(100,false,[
                     'type'     => 'bootstrap',
                     'var_page' => 'page',
             ]);
         }else{
             //获取缓存
             $result = $personnel->paginate(100,false,[
                 'type'     => 'bootstrap',
                 'var_page' => 'page',
             ]);
//             $result = unserialize($redis->get("info"));
         }


         $this->assign('info',$result);
         $this->assign('name',$name);
         $this->assign('code',$code);
        //
         $get = new GetViewMenuPermission();

         $viewMenu = $get->getViewMeun();

         $this->assign('viewMenu',$viewMenu);
        return view();
    }

    // 员工信息添加
    public function addPersonnel(){
        $personnel = new Personnels();
        $organization = new Organization();
        $position = new Position();
        $personnels = new Personnels();
        if(request()->isPost()){
            $repty_date = input('post.repty_date');
            $months=$this->getMonthNum(date('Y-m-d',time()),$repty_date);    // 工龄

            // 部门
            $organization_id = input('post.organization');
            $organization_name = Db::name('organization')->where('id',$organization_id)->value('name');

            // 岗位
            $position_id  = input('post.position_id');
            $positionInfo = Db::name('position')->where('id',$position_id)->field('id,code,name')->find();

            $data = input('post.');
            $data['organization_name'] = $organization_name;
            $data['position']     = $positionInfo['code'];
            $data['position_name']     = $positionInfo['name'];
            $data['repty_first_age']   = $months;
            $data['create_user_id']    = session('user.id');

            if($personnels->save($data) == 1){
                $redis = new Redis();
                $redis->rm('info');
                //查询数据
                $Info = $personnel->paginate(100,false,[
                    'type'     => 'bootstrap',
                    'var_page' => 'page',
                ]);
                //转换成字符串，有利于存储
                $redisInfo = serialize($Info);
                //存入缓存
                $redis->set("info",$redisInfo);

                return success('保存成功',url('personnelList'));
            }else{
                return error('请更新数据！');
            }
        }else{


            // 部门
            $redis = new Redis();
            $redis_status = $redis->has("department");
            if($redis_status==false){
                //缓存失效，重新存入
                //查询数据
                $organization = $organization::all(function($query){
                    $query->order('id asc');
                });

                $organizationArr = get_tree($organization);
                //转换成字符串，有利于存储
                $redisInfo = serialize($organizationArr);
                //存入缓存
                $redis->set("department",$redisInfo);
            }

            $organizationArr = unserialize($redis->get('department'));
            $this->assign('organizationinfo',$organizationArr);

            // 岗位
            $positionInfo = $position->where('status','=','启用')->field('id,code,name,organization_code')->select();
            $this->assign('positionInfo',$positionInfo);

            // 办公地点
            $bgddInfo = Db::query('select distinct name from uvclinic_city_view');
            $this->assign('bgddInfo',$bgddInfo);

            // 职称
            $zcInfo = Db::query('select * from uvclinic_position_functional');
            $this->assign('zcInfo',$zcInfo);

            // 汇报人
            $personnelToName = $personnel->where('state','=','正式')->field('code,name')->order('code asc')->select();
            $this->assign('personnelToName',$personnelToName);
            return view();
        }
    }

    // 用户获取部门信息
    public function getUserDepartment(){
        $redis = new Redis();
        $department = unserialize($redis->get('department'));
        foreach ($department as $key => $val){
            $data[$key]['code'] = $val['code'];
            $data[$key]['name'] = $val['name'];
        }
        echo json_encode(['status'=>'success','code'=>200,'info'=>$data]);
    }

    // 员工信息修改
    public function personnelSave(Request $request,$id = 0){
        $personnel = new Personnels();
        $position = new Position();
        $organization = new Organization();
        $redis = new Redis();
        $p_userinfo = new PersonnelsUserinfo();
        $p_workinfo = new PersonnelsWorkinfo();
        $p_property = new PersonnelsProperty();
        $p_train    = new PersonnelsTrain();
        if(request()->isPost()){
            if($id != 0){
                $personnel = $personnel::get($id);
            }

            $input = $request->except('tab_type');
            $tab_type = $request->post('tab_type');
            $input['update_user_id'] = session('user.id');

            switch ($tab_type){
                case '基本信息':
                    $res = $personnel->save($input);
                    break;
                case '个人信息':
                    $res_info = $personnel->save($request->except('tab_type,uid,nickname,username,workplace,job,address'));
                    if($res_info){
                        $result = $request->only('uid,nickname,username,workplace,job,address');
                        if(empty($result)){
                            $res = $res_info;
                        }else{
                            Db::startTrans();
                            try {
                                $count = count($result['username']);
                                $data = [];
                                for ($i=0;$i<$count;$i++){
                                    if(!empty($result['uid'][$i])){
                                        $data[$i]['uid']       = $result['uid'][$i];
                                    }

                                    $data[$i]['username']      = $result['username'][$i];
                                    $data[$i]['nickname']      = $result['nickname'][$i];
                                    $data[$i]['workplace']     = $result['workplace'][$i];
                                    $data[$i]['job']           = $result['job'][$i];
                                    $data[$i]['address']       = $result['address'][$i];
                                    $data[$i]['user_id']       = session('user.id');
                                    $data[$i]['personnels_id'] = $id;
                                }
                                $res_userinfo = $p_userinfo->saveAll($data);
                                if($res_userinfo){
                                    $res = $res_userinfo;
                                }
                                // 提交事务
                                Db::commit();
                            }catch (\Exception $e) {
                                // 回滚事务
                                Db::rollback($e->getMessage());
                            }
                        }
                    }

                    break;
                case '工作信息':
                    $res_workinfo = $personnel->save($request->only('cn_ygxz,cn_htksrq,cn_syqjsrq,cn_htjsrq'));
                    if($res_workinfo){
                        $ohters  = $request->except('cn_ygxz,cn_htksrq,cn_syqjsrq,cn_htjsrq,type,id,tab_type');
                        if(empty($ohters)){
                            $res = $res_workinfo;
                        }else{
                            $type = $request->post('type');
                            switch ($type) {
                                case 'one':
                                    Db::startTrans();
                                    try {
                                        $result = $request->only('oneid,one_language,one_poor,one_remarks');
                                        $count = count($result['one_language']);
                                        $data = [];
                                        for ($i = 0; $i < $count; $i++) {
                                            if (!empty($result['oneid'][$i])) {
                                                $data[$i]['wid'] = $result['oneid'][$i];
                                            }
                                            $data[$i]['one_language'] = $result['one_language'][$i];
                                            $data[$i]['one_poor'] = $result['one_poor'][$i];
                                            $data[$i]['remarks'] = $result['one_remarks'][$i];
                                            $data[$i]['type'] = $type;
                                            $data[$i]['user_id'] = session('user.id');
                                            $data[$i]['personnels_id'] = $id;
                                        }
                                        $res_workinfo = $p_workinfo->saveAll($data, true);
                                        if ($res_workinfo) {
                                            $res = $res_workinfo;
                                        }
                                        // 提交事务
                                        Db::commit();
                                    } catch (\Exception $e) {
                                        // 回滚事务
                                        Db::rollback();
                                        echo $e->getLine() . $e->getMessage();
                                    }
                                    break;
                                case 'two':
                                    Db::startTrans();
                                    try {
                                        $result = $request->only('twoid,two_shcool,two_major,tow_start_date,two_end_date,two_education,two_remarks');
                                        $count = count($result['two_shcool']);
                                        $data = [];
                                        for ($i = 0; $i < $count; $i++) {
                                            if (!empty($result['twoid'][$i])) {
                                                $data[$i]['wid'] = $result['twoid'][$i];
                                            }
                                            $data[$i]['two_shcool'] = $result['two_shcool'][$i];
                                            $data[$i]['two_major'] = $result['two_major'][$i];
                                            $data[$i]['tow_start_date'] = $result['tow_start_date'][$i];
                                            $data[$i]['two_end_date'] = $result['two_end_date'][$i];
                                            $data[$i]['two_education'] = $result['two_education'][$i];
                                            $data[$i]['remarks'] = $result['two_remarks'][$i];
                                            $data[$i]['type'] = $type;
                                            $data[$i]['user_id'] = session('user.id');
                                            $data[$i]['personnels_id'] = $id;
                                        }
                                        $res_workinfo = $p_workinfo->saveAll($data, true);
                                        if ($res_workinfo) {
                                            $res = $res_workinfo;
                                        }
                                        // 提交事务
                                        Db::commit();
                                    } catch (\Exception $e) {
                                        // 回滚事务
                                        Db::rollback();
                                        echo $e->getLine() . $e->getMessage();
                                    }
                                    break;
                                case 'three':
                                    Db::startTrans();
                                    try {
                                        $result = $request->only('threeid,three_company,three_start_date,three_end_date,three_job,three_remarks,three_leave_reason');
                                        $count = count($result['three_company']);
                                        $data = [];
                                        for ($i = 0; $i < $count; $i++) {
                                            if (!empty($result['threeid'][$i])) {
                                                $data[$i]['wid'] = $result['threeid'][$i];
                                            }
                                            $data[$i]['three_company'] = $result['three_company'][$i];
                                            $data[$i]['three_start_date'] = $result['three_start_date'][$i];
                                            $data[$i]['three_end_date'] = $result['three_end_date'][$i];
                                            $data[$i]['three_job'] = $result['three_job'][$i];
                                            $data[$i]['three_leave_reason'] = $result['three_leave_reason'][$i];
                                            $data[$i]['remarks'] = $result['three_remarks'][$i];
                                            $data[$i]['type'] = $type;
                                            $data[$i]['user_id'] = session('user.id');
                                            $data[$i]['personnels_id'] = $id;
                                        }
                                        $res_workinfo = $p_workinfo->saveAll($data, true);
                                        if ($res_workinfo) {
                                            $res = $res_workinfo;
                                        }
                                        // 提交事务
                                        Db::commit();
                                    } catch (\Exception $e) {
                                        // 回滚事务
                                        Db::rollback();
                                        echo $e->getLine() . $e->getMessage();
                                    }
                                    break;
                                case 'four':
                                    Db::startTrans();
                                    try {
                                        $result = $request->only('fourid,four_train_name,four_train_start_date,four_train_end_date,four_train_company,four_remarks');
                                        $count = count($result['four_train_name']);
                                        $data = [];
                                        for ($i = 0; $i < $count; $i++) {
                                            if (!empty($result['fourid'][$i])) {
                                                $data[$i]['wid'] = $result['fourid'][$i];
                                            }
                                            $data[$i]['four_train_name'] = $result['four_train_name'][$i];
                                            $data[$i]['four_train_start_date'] = $result['four_train_start_date'][$i];
                                            $data[$i]['four_train_end_date'] = $result['four_train_end_date'][$i];
                                            $data[$i]['four_train_company'] = $result['four_train_company'][$i];
                                            $data[$i]['remarks'] = $result['four_remarks'][$i];
                                            $data[$i]['type'] = $type;
                                            $data[$i]['user_id'] = session('user.id');
                                            $data[$i]['personnels_id'] = $id;
                                        }
                                        $res_workinfo = $p_workinfo->saveAll($data, true);
                                        if ($res_workinfo) {
                                            $res = $res_workinfo;
                                        }
                                        // 提交事务
                                        Db::commit();
                                    } catch (\Exception $e) {
                                        // 回滚事务
                                        Db::rollback();
                                        echo $e->getLine() . $e->getMessage();
                                    }
                                    break;
                                case 'five':
                                    Db::startTrans();
                                    try {
                                        $result = $request->only('fiveid,five_name,five_start_date,five_end_date,five_Issuing_unit');
                                        $count = count($result['five_name']);
                                        $data = [];
                                        for ($i = 0; $i < $count; $i++) {
                                            if (!empty($result['fiveid'][$i])) {
                                                $data[$i]['wid'] = $result['fiveid'][$i];
                                            }
                                            $data[$i]['five_name'] = $result['five_name'][$i];
                                            $data[$i]['five_start_date'] = $result['five_start_date'][$i];
                                            $data[$i]['five_end_date'] = $result['five_end_date'][$i];
                                            $data[$i]['five_Issuing_unit'] = $result['five_Issuing_unit'][$i];
                                            $data[$i]['type'] = $type;
                                            $data[$i]['user_id'] = session('user.id');
                                            $data[$i]['personnels_id'] = $id;
                                        }
                                        $res_workinfo = $p_workinfo->saveAll($data, true);
                                        if ($res_workinfo) {
                                            $res = $res_workinfo;
                                        }
                                        // 提交事务
                                        Db::commit();
                                    } catch (\Exception $e) {
                                        // 回滚事务
                                        Db::rollback();
                                        echo $e->getLine() . $e->getMessage();
                                    }
                                    break;
                                case 'six':
                                    Db::startTrans();
                                    try {
                                        $result = $request->only('sixid,six_name,six_date,six_remarks');
                                        $count = count($result['six_name']);
                                        $data = [];
                                        for ($i = 0; $i < $count; $i++) {
                                            if (!empty($result['sixid'][$i])) {
                                                $data[$i]['wid'] = $result['sixid'][$i];
                                            }
                                            $data[$i]['six_name'] = $result['six_name'][$i];
                                            $data[$i]['six_date'] = $result['six_date'][$i];
                                            $data[$i]['remarks'] = $result['six_remarks'][$i];
                                            $data[$i]['type'] = $type;
                                            $data[$i]['user_id'] = session('user.id');
                                            $data[$i]['personnels_id'] = $id;
                                        }
                                        $res_workinfo = $p_workinfo->saveAll($data, true);
                                        if ($res_workinfo) {
                                            $res = $res_workinfo;
                                        }
                                        // 提交事务
                                        Db::commit();
                                    } catch (\Exception $e) {
                                        // 回滚事务
                                        Db::rollback();
                                        echo $e->getLine() . $e->getMessage();
                                    }
                                    break;
                            }
                        }
                    }

                    break;
                case '系统信息':
                    $password_confirm = $request->param('cn_password_confirm');
                    $request = $request->only('name,cn_htksrq,cn_password,email,cn_aqjb');
                    if($request['cn_password'] != $password_confirm){
                        return error('确认密码不正确!');
                    }else{
                        $request['cn_password'] = think_encrypt($request['cn_password']);
                        $res = $personnel->save($request);
                    }
                    break;
                case '财务信息':
                    $request = $request->only('cn_khh,cn_bank,cn_zzkh,cn_gjjzh');
                    $res = $personnel->save($request);
                    break;
                case '资产信息':
                    Db::startTrans();
                    try {
                        $result = $request->only('pid,name,user_department,username,separate_accounting,specification,asset_group,status,period_of_depreciation,salvage');
                        $count = count($result['name']);
                        $data = [];
                        for ($i=0;$i<$count;$i++) {
                            if (!empty($result['pid'][$i])) {
                                $data[$i]['pid'] = $result['pid'][$i];
                            }
                            $data[$i]['name']                   = $result['name'][$i];
                            $data[$i]['user_department']        = $result['user_department'][$i];
                            $data[$i]['username']               = $result['username'][$i];
                            $data[$i]['separate_accounting']    = $result['separate_accounting'][$i];
                            $data[$i]['specification']          = $result['specification'][$i];
                            $data[$i]['asset_group']            = $result['asset_group'][$i];
                            $data[$i]['period_of_depreciation'] = $result['period_of_depreciation'][$i];
                            $data[$i]['salvage']                = $result['salvage'][$i];
                            $data[$i]['status']                 = $result['status'][$i];
                            $data[$i]['user_id']                = session('user.id');
                            $data[$i]['personnels_id']          = $id;
                        }
                        $res_property = $p_property->saveAll($data,true);
                        if($res_property){
                            $res = $res_property;
                        }
                        // 提交事务
                        Db::commit();
                    }catch (\Exception $e) {
                        // 回滚事务
                        Db::rollback();
                        echo $e->getLine().$e->getMessage();
                    }
                    break;
                case '培训记录':
                    Db::startTrans();
                    try {
                        $result = $request->only('tid,title,start_date,end_date,assessment,evaluation');
                        $count = count($result['title']);
                        $data = [];
                        for ($i=0;$i<$count;$i++) {
                            if (!empty($result['tid'][$i])) {
                                $data[$i]['tid'] = $result['tid'][$i];
                            }
                            $data[$i]['title']                  = $result['title'][$i];
                            $data[$i]['start_date']             = $result['start_date'][$i];
                            $data[$i]['end_date']               = $result['end_date'][$i];
                            $data[$i]['assessment']             = $result['assessment'][$i];
                            $data[$i]['evaluation']             = $result['evaluation'][$i];
                            $data[$i]['user_id']                = session('user.id');
                            $data[$i]['personnels_id']          = $id;
                        }
                        $res_train = $p_train->saveAll($data,true);
                        if($res_train){
                            $res = $res_train;
                        }
                        // 提交事务
                        Db::commit();
                    }catch (\Exception $e) {
                        // 回滚事务
                        Db::rollback();
                        echo $e->getLine().$e->getMessage();
                    }
                    break;
            }

//            $data = input('post.');
//            $data['update_user_id']  = session('user.id');
//            $data['position'] = $position->where('code',input('post.position_id'))->value('name');

            if($res){
                $redis->rm('info');
                //查询数据
                $Info = $personnel->paginate(100,false,[
                    'type'     => 'bootstrap',
                    'var_page' => 'page',
                ]);
                //转换成字符串，有利于存储
                $redisInfo = serialize($Info);
                //存入缓存
                $redis->set("info",$redisInfo);
                return success('保存成功',url('personnelList'));
            }else{
                return error('请更新数据！');
            }
        }else{

            $organization_id = $personnel->where('id',$id)->value('organization');
            $info = Db::name('personnels')->alias('p')->join('organization o','o.id=p.organization')->where('p.id',$id)->where('p.organization',$organization_id)->field('p.*,o.name as oname,o.parent_id,o.id as oid')->find();

            $info['organization_info'] = getOrganization($info['oid'],$info['oname']);


            $this->assign('info',$info);

            // 部门
            $redis_organization = $redis->has("organization");
            if($redis_organization==false){
                //缓存失效，重新存入
                //查询数据
                $organization = $organization::all(function($query){
                    $query->order('id asc');
                });

                $organizationArr = get_tree($organization);
                //转换成字符串，有利于存储
                $redisorganizationInfo = serialize($organizationArr);
                //存入缓存
                $redis->set("organization",$redisorganizationInfo);
            }

            $organizationArr = unserialize($redis->get('organization'));

            $this->assign('organizationinfo',$organizationArr);

            // 岗位
            $redis_position = $redis->has("position");
            if($redis_position==false){
                //缓存失效，重新存入
                //查询数据
                $positionInfo = $position->where('status','=','启用')->field('id,code,name,organization_code')->select();
                //转换成字符串，有利于存储
                $redisPositionInfo = serialize($positionInfo);
                //存入缓存
                $redis->set("position",$redisPositionInfo);
            }
            $positionInfo = unserialize($redis->get('position'));
            $this->assign('positionInfo',$positionInfo);

            // 部门
            $department = unserialize($redis->get('department'));
            $this->assign('department',$department);

            // 办公地点
            $bgddInfo = Db::query('select distinct name from uvclinic_city_view');
            $this->assign('bgddInfo',$bgddInfo);

            // 职称
            $zcInfo = Db::query('select * from uvclinic_position_functional');
            $this->assign('zcInfo',$zcInfo);

            // 汇报人
            $personnelToName = $personnel->where('state','=','正式')->field('code,name')->order('code asc')->select();
            $this->assign('personnelToName',$personnelToName);

            // 个人信息
            $UserInfo = $p_userinfo->where('personnels_id',$id)->select();
            $this->assign('UserInfo',$UserInfo);

            // 工作信息 语言能力
            $workinfo_one = $p_workinfo->where('type','one')->where('personnels_id',$id)->select();
            $this->assign('workinfoOne',$workinfo_one);

            // 工作信息 教育情况
            $workinfo_two = $p_workinfo->where('type','two')->where('personnels_id',$id)->select();
            $this->assign('workinfoTwo',$workinfo_two);

            // 工作信息 入职前工作简历
            $workinfo_three = $p_workinfo->where('type','three')->where('personnels_id',$id)->select();
            $this->assign('workinfoThree',$workinfo_three);

            // 工作信息 入职前培训
            $workinfo_four = $p_workinfo->where('type','four')->where('personnels_id',$id)->select();
            $this->assign('workinfoFour',$workinfo_four);

            // 工作信息 资格证书
            $workinfo_five = $p_workinfo->where('type','five')->where('personnels_id',$id)->select();
            $this->assign('workinfoFive',$workinfo_five);

            // 工作信息 资格证书
            $workinfo_six = $p_workinfo->where('type','six')->where('personnels_id',$id)->select();
            $this->assign('workinfoSix',$workinfo_six);

            // 工作信息 资产信息
            $property = $p_property->where('personnels_id',$id)->select();
            $this->assign('property',$property);

            // 工作信息 培训记录
            $train = $p_train->where('personnels_id',$id)->select();
            $this->assign('train',$train);
            return view();
        }

    }

    // 根据职位获取部门信息
    public function getDepartment(){
        if(request()->isPost()){
            $id = input('post.id');
            $info = Db::name('position')->alias('p')->join('organization o','o.code = p.organization_code')->where('p.code','=',$id)->field('p.id,p.code,p.organization_code,o.name')->find();
            if($info){
                echo json_encode(['code'=>200,'status'=>'success','data'=>$info]);
            }else{
                echo json_encode(['code'=>500,'status'=>'error']);
            }
        }
    }

    // 导入数据
    public function personnelUpload(){
        if(request()->isPost())
        {
            vendor("PHPExcel.PHPExcel");
            $objPHPExcel =new \PHPExcel();
            //获取表单上传文件
            $file = request()->file('file');
            if (empty($file)){
                echo "<font color=red>请选择上传文件</font>";
                echo '<a class="layui-btn layui-btn-normal layui-btn-radius" style="display: inline-block;height: 38px;line-height: 38px;padding: 0 18px;background-color: #1E9FFF;color: #fff;white-space: nowrap;text-align: center;font-size: 14px;border: none;border-radius: 2px;cursor: pointer;border-radius: 100px;" onclick="javascript:history.go(-1);">返回</a>';
                die();
            }
            $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public/uploads');  //上传验证后缀名,以及上传之后移动的地址  E:\wamp\www\bick\public
            if($info)
            {
                $exclePath = $info->getSaveName();  //获取文件名
                $extension = strtolower( pathinfo($exclePath, PATHINFO_EXTENSION) );
                $file_name = ROOT_PATH . 'public\uploads' . DS . $exclePath;//上传文件的地址
                if ($extension =='xlsx') {

                    $objReader =\PHPExcel_IOFactory::createReader("Excel2007");
                    $obj_PHPExcel =$objReader->load($file_name, $encode = 'utf-8');  //加载文件内容,编码utf-8
                }else{
                    $objReader =\PHPExcel_IOFactory::createReader("Excel5");
                    $obj_PHPExcel =$objReader->load($file_name, $encode = 'utf-8');  //加载文件内容,编码utf-8
                }
                $excel_array=$obj_PHPExcel->getSheet(0)->toArray();   //转换为数组格式
                array_shift($excel_array);  //删除第一个数组(标题);
                $info = [];
                $i=0;
                $erri=0;
                foreach($excel_array as $k=>$v) {

                    $info[$k]['code'] = intval($v[0]);
                    $info[$k]['name'] = $v[1];
                    $info[$k]['pingyin'] = $v[2];
                    $info[$k]['en_name'] = $v[3];
                    $info[$k]['sex'] = $v[4];
                    $info[$k]['organization'] = $v[5];
                    $info[$k]['organization_name'] = $v[6];
                    $info[$k]['position_id'] = $v[7];
                    $info[$k]['position_name'] = $v[8];
                    $info[$k]['rand'] = $v[9];
                    $info[$k]['responsibilities'] = $v[10];
                    $info[$k]['state'] = $v[11];
                    $info[$k]['bgdd'] = $v[12];
                    $info[$k]['jobcode'] = $v[13];
                    $info[$k]['specialty'] = $v[14];
                    $info[$k]['like'] = $v[15];
                    $info[$k]['repty_date'] = $v[16];
                    $info[$k]['mobilephone'] = $v[17];
                    $info[$k]['officephone'] = $v[18];
                    $info[$k]['otherphone'] = $v[19];
                    $info[$k]['fax'] = $v[20];
                    $info[$k]['email'] = $v[21];
                    $info[$k]['office'] = $v[22];
                    $info[$k]['report_name'] = $v[23];
                    $info[$k]['assistant'] = $v[24];
                    $info[$k]['birth'] = $v[25];
                    $info[$k]['cn_mz'] = $v[26];
                    $info[$k]['cn_jiguan'] = $v[27];
                    $info[$k]['cn_hk'] = $v[28];
                    $info[$k]['IDcard'] = $v[29];
                    $info[$k]['cn_hy'] = $v[30];
                    $info[$k]['cn_zzmm'] = $v[31];
                    $info[$k]['cn_rutuan_time'] = $v[32];
                    $info[$k]['cn_rudang_time'] = $v[33];
                    $info[$k]['cn_ghhy'] = $v[34];
                    $info[$k]['cn_zgxl'] = $v[35];
                    $info[$k]['cn_xw'] = $v[36];
                    $info[$k]['cn_jkzk'] = $v[37];
                    $info[$k]['cn_height'] = $v[38];
                    $info[$k]['cn_weight'] = $v[39];
                    $info[$k]['cn_xjzddz'] = $v[40];
                    $info[$k]['cn_sfzdz'] = $v[41];
                    $info[$k]['cn_zzz_number'] = $v[42];
                    $info[$k]['cn_ygxz'] = $v[43];
                    $info[$k]['cn_htksrq'] = $v[44];
                    $info[$k]['cn_syqjsrq'] = $v[45];
                    $info[$k]['cn_htjsrq'] = $v[46];
                    $info[$k]['cn_khh'] = $v[47];
                    $info[$k]['cn_bank'] = $v[48];
                    $info[$k]['cn_zzkh'] = convert_scientific_number_to_normal($v['49']);
                    $info[$k]['cn_gjjzh'] = intval($v[50]);
                    $info[$k]['repty_first_age'] = $this->getMonthNum(date('Y-m-d',time()),$v[16]);
                    $info[$k]['age'] = $this->getAgeByIdcard($v[29]);
                    $info[$k]['create_time'] = date('y-m-d H:i:s',time());
                    $info[$k]['update_time'] = date('y-m-d H:i:s',time());
                    $info[$k]['create_user_id'] = session('user.id');
                    $i++;
                }


                if($erri>0){
                    echo "<br><font color=red>以上共".$erri."条数据导入失败</font>";
                }
                if($i>0){
                    echo "<br><font color=red>成功导入".$i."条数据！！！请勿重新导</font>";
                    echo '<a class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>';
                }
                Db::execute('TRUNCATE table uvclinic_personnels');
                $personnel = new Personnels();
                $personnel->insertAll($info);
            }else
            {
                echo $file->getError();
            }
        }
        return view();
    }

    // 移除用户信息界面不同类型下面的数据
    public function delTypeInfo(Request $request){
        if($request->isPost()){
            $userinfo = new PersonnelsUserinfo();
            $workinfo = new PersonnelsWorkinfo();
            $param = $request->only('type,id');
            // 启动事务
            Db::startTrans();
            try{
                $firstKey = substr($param['type'],0,1);
                $res = Db::name('personnels_'.$param['type'])->where($firstKey.'id',$param['id'])->delete();
                // 提交事务
                Db::commit();
            }catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
            }

            if($res){
                echo json_encode(['status'=>'success','code'=>200,'msg'=>'移除成功']);
            }else{
                echo json_encode(['status'=>'error','code'=>0,'msg'=>'移除失败']);
            }
        }
    }

    // 导出数据
    public function personnelDownload(){
        $personnel = new Personnels();
        $list = $personnel->order('code asc')->select();


        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel();

        $objPHPExcel->getProperties()->setCreator("ctos")
            ->setLastModifiedBy("ctos")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(20);



        //设置行高度
//        $objPHPExcel->getActiveSheet()->getRowDimension('A')->setRowHeight(20);
        

        //设置水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('L')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('N')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('O')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('P')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('Q')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('R')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('S')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('T')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('U')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('V')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('W')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('X')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('Y')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('Z')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AA')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AB')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AC')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AD')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AE')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AF')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AG')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AH')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AI')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AJ')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AK')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AL')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AN')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AO')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AP')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AQ')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AR')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AS')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AT')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AU')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AV')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AW')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AX')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('AY')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        //合并cell
        // $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');

        //长度不够显示的时候 是否自动换行
        // $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setWrapText(true);


        // set table header content
        $objPHPExcel->setActiveSheetIndex(0)
                // ->setCellValue('A1', '总计：'.$count.'条， 总和：'.$sum)
                ->setCellValue('A1', '编号（必填）')
                ->setCellValue('B1', '姓名（必填）')
                ->setCellValue('C1', '拼音')
                ->setCellValue('D1', '英文名')
                ->setCellValue('E1', '性别(必填)')
                ->setCellValue('F1', '部门id(必填)')
                ->setCellValue('G1', '部门名称(必填)')
                ->setCellValue('H1', '岗位id(必填)')
                ->setCellValue('I1', '岗位名称(必填)')
                ->setCellValue('J1', '职级')
                ->setCellValue('K1', '职责描述')
                ->setCellValue('L1', '状态')
                ->setCellValue('M1', '办公地点(必填)')
                ->setCellValue('N1', '工号')
                ->setCellValue('O1', '有何专长')
                ->setCellValue('P1', '爱好')
                ->setCellValue('Q1', '入职日期')
                ->setCellValue('R1', '移动电话')
                ->setCellValue('S1', '办公室电话')
                ->setCellValue('T1', '其他电话')
                ->setCellValue('U1', '传真')
                ->setCellValue('V1', '电子邮件')
                ->setCellValue('W1', '办公室')
                ->setCellValue('X1', '直接上级(必填)')
                ->setCellValue('Y1', '助理')
                ->setCellValue('Z1', '出生日期')
                ->setCellValue('AA1', '民族')
                ->setCellValue('AB1', '籍贯')
                ->setCellValue('AC1', '户口')
                ->setCellValue('AD1', '身份证号码')
                ->setCellValue('AE1', '婚姻状况')
                ->setCellValue('AF1', '政治面貌')
                ->setCellValue('AG1', '入团日期')
                ->setCellValue('AH1', '入党日期')
                ->setCellValue('AI1', '工会会员')
                ->setCellValue('AJ1', '学历')
                ->setCellValue('AK1', '学位')
                ->setCellValue('AL1', '健康状况')
                ->setCellValue('AM1', '身高(cm)')
                ->setCellValue('AN1', '体重(kg)')
                ->setCellValue('AO1', '现居住地')
                ->setCellValue('AP1', '家庭联系方式')
                ->setCellValue('AQ1', '暂住证号码')
                ->setCellValue('AR1', '用工性质')
                ->setCellValue('AS1', '合同开始日期')
                ->setCellValue('AT1', '试用期结束日期')
                ->setCellValue('AU1', '合同结束日期')
                ->setCellValue('AV1', '工资账号户名')
                ->setCellValue('AW1', '工资银行')
                ->setCellValue('AX1', '工资账号')
                ->setCellValue('AY1', '公积金帐户');


        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<count($list);$i++){
            $objPHPExcel->getActiveSheet(0)->setCellValue('A'.($i+2), $list[$i]['code']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('B'.($i+2), $list[$i]['name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('C'.($i+2), $list[$i]['pingyin']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('D'.($i+2), $list[$i]['en_name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('E'.($i+2), $list[$i]['sex']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('F'.($i+2), $list[$i]['organization']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('G'.($i+2), $list[$i]['organization_name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('H'.($i+2), $list[$i]['position_id']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('I'.($i+2), $list[$i]['position_name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('J'.($i+2), $list[$i]['rand']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('K'.($i+2), $list[$i]['responsibilities']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('L'.($i+2), $list[$i]['state']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('M'.($i+2), $list[$i]['bgdd']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('N'.($i+2), $list[$i]['jobcode']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('O'.($i+2), $list[$i]['specialty']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('P'.($i+2), $list[$i]['like']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('Q'.($i+2), $list[$i]['repty_date']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('R'.($i+2), $list[$i]['mobilephone']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('S'.($i+2), $list[$i]['officephone']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('T'.($i+2), $list[$i]['otherphone']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('U'.($i+2), $list[$i]['fax']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('V'.($i+2), $list[$i]['email']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('W'.($i+2), $list[$i]['office']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('X'.($i+2), $list[$i]['report_name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('Y'.($i+2), $list[$i]['assistant']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('Z'.($i+2), $list[$i]['birth']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AA'.($i+2), $list[$i]['cn_mz']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AB'.($i+2), $list[$i]['cn_jiguan']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AC'.($i+2), $list[$i]['cn_hk']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AD'.($i+2), $list[$i]['IDcard']."\t");
            $objPHPExcel->getActiveSheet(0)->setCellValue('AE'.($i+2), $list[$i]['cn_hy']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AF'.($i+2), $list[$i]['cn_zzmm']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AG'.($i+2), $list[$i]['cn_rutuan_time']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AH'.($i+2), $list[$i]['cn_rudang_time']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AI'.($i+2), $list[$i]['cn_ghhy']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AJ'.($i+2), $list[$i]['cn_zgxl']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AK'.($i+2), $list[$i]['cn_xw']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AL'.($i+2), $list[$i]['cn_jkzk']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AM'.($i+2), $list[$i]['cn_height']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AN'.($i+2), $list[$i]['cn_weight']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AO'.($i+2), $list[$i]['cn_xjzddz']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AP'.($i+2), $list[$i]['cn_sfzdz']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AQ'.($i+2), $list[$i]['cn_zzz_number']."\t");
            $objPHPExcel->getActiveSheet(0)->setCellValue('AR'.($i+2), $list[$i]['cn_ygxz']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AS'.($i+2), $list[$i]['cn_htksrq']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AT'.($i+2), $list[$i]['cn_syqjsrq']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AU'.($i+2), $list[$i]['cn_htjsrq']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AV'.($i+2), $list[$i]['cn_khh']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AW'.($i+2), $list[$i]['cn_bank']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AX'.($i+2), $list[$i]['cn_zzkh']."\t");
            $objPHPExcel->getActiveSheet(0)->setCellValue('AY'.($i+2), $list[$i]['cn_gjjzh']."\t");
            $objPHPExcel->getActiveSheet()->getRowDimension($i+2)->setRowHeight(16);
        }

        //  sheet命名
        $objPHPExcel->getActiveSheet()->setTitle('员工信息表');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        $date = date('Y-m-d H:i:s',time());
        // excel头参数
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="员工信息表('.$date.').xls"');  //日期为文件名后缀
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //excel5为xls格式，excel2007为xlsx格式

        $objWriter->save('php://output');
    }


    // 删除数据
    public function delPersonnel(){
        $id = input('post.id');

        $personnel = new Personnels();
        $res = $personnel::destroy($id);
        if($res == 1){
            $redis = new Redis();
            $redis->rm('info');
            //查询数据
            $Info = $personnel->paginate(100,false,[
                'type'     => 'bootstrap',
                'var_page' => 'page',
            ]);
            //转换成字符串，有利于存储
            $redisInfo = serialize($Info);
            //存入缓存
            $redis->set("info",$redisInfo);
            echo json_encode(['status'=>'success','code'=>200,'msg'=>'删除成功']);
        }else{
            echo json_encode(['status'=>'error','code'=>201,'msg'=>'删除失败']);
        }
    }

    // 工龄
    protected function getMonthNum($date1,$data2){
        $data1_time = strtotime($date1);
        $data2_time = strtotime($data2);

        $Y = date('Y',$data2_time) - date('Y',$data1_time);
        $M = date('m',$data2_time) - date('m',$data1_time);
        return $res = abs($Y*12 + $M);
    }
}
