<?php

namespace app\assessment\controller;

use app\assessment\model\Personnels;
use think\Request;
use app\assessment\model\Organization;
use app\assessment\model\Position;
use think\cache\driver\Redis;
use think\Db;

class Personnelstatus extends Common {

    public function _initialize()
    {
        $organization = new Organization();
        $position = new Position();
        $personnels = new Personnels();
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

        // 汇报人
        $personnelToName = $personnels->where('state','=','正式')->field('code,name')->order('code asc')->select();
        $this->assign('personnelToName',$personnelToName);
    }

    /*
     * 人员试用
     * */
    public function trial(){
        $type = '试用';
        $personnels = new Personnels();
        $info = $personnels->where('state','<>','试用')->where('state','<>','正式')->field('id,name')->select();
        $this->assign('info',$info);
        return view('trial_confirmation',compact('type'));
    }

    /*
     * 转正
     * */
    public function confirmation(){
        $type = '转正';
        $personnels = new Personnels();
        $info = $personnels->where('state','=','试用')->field('id,name')->select();
        $this->assign('info',$info);
        return view('trial_confirmation',compact('type'));
    }

    /*
     * 续签
     * */
    public function renewal(){
        $type= '续签';
        $personnels = new Personnels();
        $info = $personnels->where('state','=','正式')->whereOr('state','=','临时')->field('id,name')->select();
        $this->assign('info',$info);
        return view('renewal',compact('type'));
    }

    /*
     * 调动
     * */
    public function transfer(){
        $type= '调动';
        $personnels = new Personnels();
        $info = $personnels->where('state','<>','离职')->whereOr('state','<>','退休')->whereOr('state','<>','解聘')->field('id,name')->select();
        $this->assign('info',$info);
        return view('transfer',compact('type'));
    }

    /*
     * 离职
     * */
    public function quit(){
        $type = '离职';
        $personnels = new Personnels();
        $info = $personnels->where('state','=','正式')->field('id,name')->select();
        $this->assign('info',$info);
        return view('quit_retire',compact('type'));
    }

    /*
     * 退休
     * */
    public function retire(){
        $type = '退休';
        $personnels = new Personnels();
        $info = $personnels->where('state','=','正式')->field('id,name')->select();
        $this->assign('info',$info);
        return view('quit_retire',compact('type'));
    }

    /*
     * 解聘
     * */
    public function dismissal(){
        $type = '解聘';
        $personnels = new Personnels();
        $info = $personnels->where('state','=','正式')->field('id,name')->select();
        $this->assign('info',$info);
        return view('dismissal_employment',compact('type'));
    }

    /*
     * 返聘
     * */
    public function employment(){
        $type = '返聘';
        $personnels = new Personnels();
        $info = $personnels->where('state','=','离职')->field('id,name')->select();
        $this->assign('info',$info);
        return view('dismissal_employment',compact('type'));
    }

    // 保存人事状态信息
    public function savePersonnelStatus(Request $request){
        $personnels = new Personnels();
        $type = $request->param('type');
        switch ($type){
            case "试用";
                $id = $request->param('id');
                $dates = $request->param('dates');
                $remarks = $request->param('remarks');
                $res = $personnels->save([
                    'state'            => $type,
                    'cn_syqjsrq'       => $dates,
                    'cn_sy_remarks'    => $remarks
                ],['id'=>$id]);
                if($res){
                    return success('保存成功',url('trial'));
                }else{
                    return error('保存失败');
                }
                break;
            case "转正";
                $id = $request->param('id');
                $dates = $request->param('dates');
                $remarks = $request->param('remarks');
                $res = $personnels->save([
                    'state'            => '正式',
                    'cn_zzrq'          => $dates,
                    'cn_zz_remarks'    => $remarks
                ],['id'=>$id]);
                if($res){
                    return success('保存成功',url('confirmation'));
                }else{
                    return error('保存失败');
                }
                break;
            case "续签";
                $id = $request->param('id');
                $cn_xq_state = $request->param('cn_xq_state');
                $cn_xqrq = $request->param('cn_xqrq');
                $cn_xqjsrq = $request->param('cn_xqjsrq');
                $remarks = $request->param('remarks');
                $res = $personnels->save([
                    'state'            => $cn_xq_state,
                    'cn_xqrq'          => $cn_xqrq,
                    'cn_xqjsrq'        => $cn_xqjsrq,
                    'cn_xq_remarks'    => $remarks
                ],['id'=>$id]);
                if($res){
                    return success('保存成功',url('renewal'));
                }else{
                    return error('保存失败');
                }
                break;
            case "调动";
                $id = $request->param('id');
                $cn_dddate = $request->param('cn_dddate');
                $cn_dd_remarks = $request->param('cn_dd_remarks');
                $report_name = $request->param('report_name');

                // 部门
                $cn_new_organization_id = $request->param('cn_new_organization_id');
                $cn_new_organization_name = Db::name('organization')->where('id',$cn_new_organization_id)->value('name');

                // 岗位
                $cn_new_position_id = $request->param('cn_new_position_id');
                $cn_new_position_name = Db::name('position')->where('id',$cn_new_position_id)->field('id,code,name')->value('name');

                $res = $personnels->save([
                    'cn_dd_state'               => '调动',
                    'cn_dddate'                 => $cn_dddate,
                    'cn_dd_remarks'             => $cn_dd_remarks,
                    'report_name'               => $report_name,
                    'cn_new_organization_id'    => $cn_new_organization_id,
                    'cn_new_organization_name'  => $cn_new_organization_name,
                    'cn_new_position_id'        => $cn_new_position_id,
                    'cn_new_position_name'      => $cn_new_position_name
                ],['id'=>$id]);
                if($res){
                    return success('保存成功',url('transfer'));
                }else{
                    return error('保存失败');
                }
                break;
            case "离职";
                $id = $request->param('id');
                $cn_lzdate = $request->param('to_date');
                $remarks = $request->param('remarks');
                $res = $personnels->save([
                    'state'            => '离职',
                    'cn_lzdate'        => $cn_lzdate,
                    'cn_lz_remarks'    => $remarks
                ],['id'=>$id]);
                if($res){
                    return success('保存成功',url('quit_retire'));
                }else{
                    return error('保存失败');
                }
                break;
            case "退休";
                $id = $request->param('id');
                $cn_lzdate = $request->param('to_date');
                $remarks = $request->param('remarks');
                $res = $personnels->save([
                    'state'            => '退休',
                    'cn_lzdate'        => $cn_lzdate,
                    'cn_lz_remarks'    => $remarks
                ],['id'=>$id]);
                if($res){
                    return success('保存成功',url('quit_retire'));
                }else{
                    return error('保存失败');
                }
                break;
            case "解聘";
                $id = $request->param('id');
                $cn_jpdate = $request->param('to_date1');
                $remarks = $request->param('remarks');
                $res = $personnels->save([
                    'state'            => '解聘',
                    'cn_jpdate'        => $cn_jpdate,
                    'cn_jp_remarks'    => $remarks
                ],['id'=>$id]);
                if($res){
                    return success('保存成功',url('dismissal_employment'));
                }else{
                    return error('保存失败');
                }
                break;
            case "返聘";
                $id = $request->param('id');
                $cn_fpksdate = $request->param('to_date1');
                $cn_fpjsdate = $request->param('to_date2');
                $remarks = $request->param('remarks');
                $res = $personnels->save([
                    'state'              => '返聘',
                    'cn_fpksdate'        => $cn_fpksdate,
                    'cn_fpjsdate'        => $cn_fpjsdate,
                    'cn_fp_remarks'      => $remarks
                ],['id'=>$id]);
                if($res){
                    return success('保存成功',url('dismissal_employment'));
                }else{
                    return error('保存失败');
                }
                break;
        }
    }

    // 通过被调动人获取相应的岗位信息
    public function getPersonnelsPositionName(Request $request){
        $id = $request->param('id');
        $personnels = new Personnels();
        $data = $personnels->where('id',$id)->field('id,name,position,position_name')->find();
        echo json_encode(['code'=>0,'state'=>'success','data'=>$data]);
    }
}