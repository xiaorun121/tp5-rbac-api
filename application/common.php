<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use app\assessment\model\Menu;
use app\assessment\model\KpiAssessment;
// 应用公共文件
error_reporting(0);

use think\Db;

function get_tree($data, $parent_id = 0, $level = 0) {
    static $arr = array();
    foreach ($data as $d) {
        if ($d['parent_id'] == $parent_id) {
            $d['level'] = $level;
            $arr[] = $d;
            get_tree($data, $d['id'], $level + 1);
        }
    }

    return $arr;
}

function get_tree_left($data, $parent_id = 0) {
    static $arr = array();
    foreach ($data as $d) {

        if ($d['parent_id'] == $parent_id) {

            $role_id = session('user.role_id');
            $role = Db::name('role')->where('id',$role_id)->find();
    				$role_name = $role['name'];

            $menu_id = Db::name('permission')->where('role_id',$role_id)->field('menu_id')->select();
            foreach ($menu_id as $key => $value) {
                $menu_id[$key] = $value['menu_id'];
            }
            $menu_id = implode(',',$menu_id);
            $menu =  (new Menu)->where('parent_id',$d['id'])->where('id','in',$menu_id)->order('sort asc')->select();

            $d['children'] = array();
            foreach ($menu as $key => $value) {
                $menu[$key] = $value->toArray();
            }
            $d['children'] = $menu;    // 二级菜单

            // 三级菜单
            foreach($menu as $key => $val){
                $menu_child =  (new Menu)->where('parent_id',$val['id'])->where('id','in',$menu_id)->where('is_menu',1)->select();
                foreach ($menu_child as $k => $v) {
                    $d['children'][$key]['child'][] = $v->toArray();
                }
            }


            $arr[] = $d;
            get_tree($data, $d['id']);
        }
    }
    return $arr;
}

function success($msg = '成功', $url = ''){
	$data['status'] = 200;
	$data['msg']    = $msg;
	$data['url']    = $url;
	return json($data);
}


function error($msg = '失败', $url = ''){
	$data['status'] = 202;
	$data['msg']    = $msg;
	$data['url']    = $url;
	return json($data);
}

// 状态显示
function showOpen($open){
  	if($open == 'on'){
  		  $data = '启用';
  	}else{
  		  $data = '禁用';
  	}
  	return $data;
}

// 角色显示
function showRole($role_id = 0){
  	$res = Db::name('role')->where('id',$role_id)->where('delete_time is  null')->field('name')->value('name');

    if(!empty($res)){
        return $res;
    }else{
        return '<font style="color:red">角色已删除，请重新分配角色</font>';
    }

}

// 组织信息部门显示
function showKpiDepartment($kpi_department_id = 0){
  	$res = Db::name('organization')->where('id',$kpi_department_id)->where('delete_time is  null')->field('name')->value(name);

  	return $res;
}

// 上级组织单元
function showParentOrganization($id){
    $res = Db::name('organization')->where('id',$id)->where('delete_time is  null')->field('name')->find();
    if($res){
        return $res['name'];
    }
}

// 上级组织单元parent_id
function showOrganizationParentId($code,$name,$pName){
    if(strlen($code) > 2){
        $code = substr($code,0,2);
        $id = Db::name('organization')->where('code', 'like', $code.'%')->where('name',$pName)->where('delete_time is  null')->value('id');
        if($id){
            return $id;
        }
    }else if(strlen($code) == 2){
        $id = Db::name('organization')->where('name',$pName)->where('delete_time is  null')->value('id');

        return $id;
    }else{
        return 0;
    }
}

// 职位信息所属组织名称
function showPositionToOrganization($organization_code){
    $organizationName = Db::name('organization')->where('code',$organization_code)->value('name');
    if($organizationName){
        return $organizationName;
    }
}

// 职位信息上级职位
function showPositionToParentName($parent_id){
    if($parent_id == 0){
        return '';
    }else{
        $positionName = Db::name('position')->where('code',$parent_id)->value('name');
        return $positionName;
    }
}

// 职位信息获取相应的城市
function showCity($organization_code){
    $organization_code = substr($organization_code,0,2);
    if($organization_code == 10){
        $res = Db::name('organization')->where('code',1)->value('name');
    }else{
        $res = Db::name('organization')->where('code',$organization_code)->value('name');
    }
    return $res;
}

// 状态
function showStatus($id){
    if($id == 1){
        return '启用';
    }else{
        return '关闭';
    }
}

// 用户状态显示
function display($status = 0){
	if($status == 1){
		$data = '是';
	}else{
		$data = '否';
	}
	return $data;
}

function Images($img = 0){
	if($img){
		$data = __UPLOADS__.'/'.$img;
	}else{
		$data = '';
	}
	return $data;
}


?>
