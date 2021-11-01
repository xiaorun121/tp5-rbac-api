<?php

namespace app\assessment\controller;

use app\assessment\model\Personnel;
use think\Controller;
use think\Db;
use think\Request;
use think\paginator\driver\Bootstrap;
use think\cache\driver\Redis;

class Report extends Common
{

    public function _initialize()
    {
        $organization = new \app\assessment\model\Organization();
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

        // 办公地点
        $bgddInfo = Db::query('select distinct name from uvclinic_city_view');
        $this->assign('bgddInfo',$bgddInfo);
    }

    /*
     * 年龄报表
     * */
    public function ageReport(Request $request){
        $organization = $request->param('organization');
        $bgdd = $request->param('bgdd');
        $repty_date_start = $request->param('repty_date_start');
        $repty_date_end = $request->param('repty_date_end');
        $state = $request->param('state');
        $where = 'and delete_time is null';
        if(!empty($organization)){
            $where .= ' and organization = '.$organization;
        }
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($repty_date_start)){
            $where .= ' and repty_date >= "'.$repty_date_start.'"';
        }
        if(!empty($repty_date_end)){
            $where .= ' and repty_date <= "'.$repty_date_end.'"';
        }
        if(!empty($state)){
            $where .= ' and state = "'.$state.'"';
        }

        $data = [
            'organization'       => $organization,
            'bgdd'               => $bgdd,
            'repty_date_start'   => $repty_date_start,
            'repty_date_end'     => $repty_date_end,
            'state'              => $state
        ];

        $this->assign('data',$data);

        $info = Db::query('SELECT 年龄段 ages,SUM(人数) value,SUM(人数)/(select count(*) from uvclinic_personnels where 1 = 1 '.$where.') proportion FROM (
                            SELECT
                            CASE
                            WHEN 年龄 between 20 and 29 THEN \'20-29岁\'
                            WHEN 年龄 between 30 and 39 THEN \'30-39岁\'
                            WHEN 年龄 between 40 and 49 THEN \'40-49岁\'
                            WHEN 年龄 between 50 and 59 THEN \'50-59岁\'
                            WHEN 年龄 between 60 and 69 THEN \'60-69岁\'
                            WHEN 年龄 between 70 and 79 THEN \'70-79岁\'
                            ELSE \'其他\' END 年龄段, 人数
                            FROM (
                            SELECT 年龄,人数 FROM (
                            select age 年龄,count(*) 人数
                            from uvclinic_personnels where 1 = 1 '.$where.' group by age )A GROUP BY A.年龄,A.人数)A )B GROUP BY 年龄段');
        $this->assign('info',$info);
        $arr['sum'] = '';
        foreach ($info as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }

    /*
     * 性别报表
     * */
    public function sexReport(Request $request){
        $organization = $request->param('organization');
        $bgdd = $request->param('bgdd');
        $repty_date_start = $request->param('repty_date_start');
        $repty_date_end = $request->param('repty_date_end');
        $state = $request->param('state');
        $where = 'and delete_time is null';
        if(!empty($organization)){
            $where .= ' and organization = '.$organization;
        }
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($repty_date_start)){
            $where .= ' and repty_date >= "'.$repty_date_start.'"';
        }
        if(!empty($repty_date_end)){
            $where .= ' and repty_date <= "'.$repty_date_end.'"';
        }
        if(!empty($state)){
            $where .= ' and state = "'.$state.'"';
        }

        $data = [
            'organization'       => $organization,
            'bgdd'               => $bgdd,
            'repty_date_start'   => $repty_date_start,
            'repty_date_end'     => $repty_date_end,
            'state'              => $state
        ];
        $this->assign('data',$data);

        $info = Db::query('select sex,count(id) value, count(id)/(select count(id) from uvclinic_personnels where 1 = 1 '.$where.') proportion	from  uvclinic_personnels where 1 = 1 '.$where.' group by sex');

        $this->assign('info',$info);

        $arr['sum'] = '';
        foreach ($info as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }

    /*
     * 工龄报表
     * */
    public function workingYearsReport(Request $request){
        $organization = $request->param('organization');
        $bgdd = $request->param('bgdd');
        $state = $request->param('state');
        $where = 'and delete_time is null';
        if(!empty($organization)){
            $where .= ' and organization = '.$organization;
        }
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($state)){
            $where .= ' and state = "'.$state.'"';
        }

        $data = [
            'organization' => $organization,
            'bgdd'         => $bgdd,
            'state'        => $state
        ];
        $this->assign('data',$data);

        $info = Db::query('SELECT 工龄段 repty_first_age,SUM(人数) value,SUM(人数)/(select count(*) from uvclinic_personnels where 1 = 1 '.$where.') proportion FROM (
                            SELECT
                            CASE
                            WHEN 工龄 between 0 and 12 THEN \'0-1 年\'
                            WHEN 工龄 between 13 and 24 THEN \'1-2 年\'
                            WHEN 工龄 between 25 and 36 THEN \'2-3 年\'
                            WHEN 工龄 between 37 and 48 THEN \'3-4 年\'
                            WHEN 工龄 between 49 and 60 THEN \'4-5 年\'
                            WHEN 工龄 between 61 and 72 THEN \'5-6 年\'
														WHEN 工龄 between 73 and 84 THEN \'6-7 年\'
														WHEN 工龄 between 85 and 96 THEN \'7-8 年\'
														WHEN 工龄 between 97 and 108 THEN \'8-9 年\'
														WHEN 工龄 between 109 and 120 THEN \'9-10 年\'
                            ELSE \'超过10年以上\' END 工龄段, 人数
                            FROM (
                            SELECT 工龄,人数 FROM (
                            select repty_first_age 工龄,count(*) 人数
                            from uvclinic_personnels where 1 = 1 '.$where.' group by repty_first_age )A GROUP BY A.工龄,A.人数)A )B GROUP BY 工龄段');
        $this->assign('info',$info);
        $arr['sum'] = '';
        foreach ($info as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }

    /*
     * 学历报表
     * */
    public function educationReport(Request $request){
        $organization = $request->param('organization');
        $bgdd = $request->param('bgdd');
        $repty_date_start = $request->param('repty_date_start');
        $repty_date_end = $request->param('repty_date_end');
        $state = $request->param('state');
        $where = 'and delete_time is null';
        if(!empty($organization)){
            $where .= ' and organization = '.$organization;
        }
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($repty_date_start)){
            $where .= ' and repty_date >= "'.$repty_date_start.'"';
        }
        if(!empty($repty_date_end)){
            $where .= ' and repty_date <= "'.$repty_date_end.'"';
        }
        if(!empty($state)){
            $where .= ' and state = "'.$state.'"';
        }

        $data = [
            'organization' => $organization,
            'bgdd'         => $bgdd,
            'repty_date_start'   => $repty_date_start,
            'repty_date_end'     => $repty_date_end,
            'state'        => $state
        ];
        $this->assign('data',$data);

        $info = Db::query('select cn_zgxl,count(id) value, count(id)/(select count(id) from uvclinic_personnels where 1 = 1 and cn_zgxl != \'\' '.$where.' ) proportion from  uvclinic_personnels where 1 = 1 and cn_zgxl != \'\' '.$where.' group by cn_zgxl');
        $this->assign('info',$info);
        $arr['sum'] = '';
        foreach ($info as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }

    /*
     * 部门报表
     * */
    public function departmentReport(Request $request){
        $bgdd = $request->param('bgdd');
        $repty_date_start = $request->param('repty_date_start');
        $repty_date_end = $request->param('repty_date_end');
        $state = $request->param('state');
        $where = 'and delete_time is null';
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($repty_date_start)){
            $where .= ' and repty_date >= "'.$repty_date_start.'"';
        }
        if(!empty($repty_date_end)){
            $where .= ' and repty_date <= "'.$repty_date_end.'"';
        }
        if(!empty($state)){
            $where .= ' and state = "'.$state.'"';
        }

        $data = [
            'bgdd'         => $bgdd,
            'repty_date_start'   => $repty_date_start,
            'repty_date_end'     => $repty_date_end,
            'state'        => $state
        ];
        $this->assign('data',$data);

        $page = $request->param('page');
        $num = 10; //分页个数
        $page = $page ? $page : 1; //当前页
        $limit=($page-1)*10;
        $count_list = "select organization_name,count(organization_name) value, count(organization_name)/(select count(organization_name) from uvclinic_personnels where 1 = 1 and organization_name != '' $where) proportion from uvclinic_personnels where 1 = 1 and organization_name != '' $where group by organization_name";
        $sql = "select organization_name,count(organization_name) value, count(organization_name)/(select count(organization_name) from uvclinic_personnels where 1 = 1 and organization_name != '' $where) proportion from uvclinic_personnels where 1 = 1 and organization_name != '' $where group by organization_name LIMIT {$limit},{$num}";
        $list = Db::query($sql);
        $count_list = Db::query($count_list);
        $count = count($count_list);
        $data = Bootstrap::make($list, $num, $page, $count, false, ['path' => Bootstrap::getCurrentPath(), 'query' => request()->param()]);
        $this->assign('info',$data);
        $arr['sum'] = '';
        foreach ($count_list as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }

    /*
     * 岗位报表
     * */
    public function positionReport(Request $request){
        $bgdd = $request->param('bgdd');
        $repty_date_start = $request->param('repty_date_start');
        $repty_date_end = $request->param('repty_date_end');
        $state = $request->param('state');
        $where = 'and delete_time is null';
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($repty_date_start)){
            $where .= ' and repty_date >= "'.$repty_date_start.'"';
        }
        if(!empty($repty_date_end)){
            $where .= ' and repty_date <= "'.$repty_date_end.'"';
        }
        if(!empty($state)){
            $where .= ' and state = "'.$state.'"';
        }

        $data = [
            'bgdd'         => $bgdd,
            'repty_date_start'   => $repty_date_start,
            'repty_date_end'     => $repty_date_end,
            'state'        => $state
        ];
        $this->assign('data',$data);

        $page = $request->param('page');
        $num = 10; //分页个数
        $page = $page ? $page : 1; //当前页
        $limit=($page-1)*10;
        $count_list = "select position_name,count(position_name) value, count(position_name)/(select count(position_name) from uvclinic_personnels where 1 = 1 and position_name != ''  $where) proportion from uvclinic_personnels where 1 = 1 and position_name != '' $where group by position_name";
        $sql = "select position_name,count(position_name) value, count(position_name)/(select count(position_name) from uvclinic_personnels where 1 = 1 and position_name != ''  $where) proportion	from  uvclinic_personnels where 1 = 1 and position_name != ''  $where group by position_name LIMIT {$limit},{$num}";
        $list = Db::query($sql);
        $count_list = Db::query($count_list);
        $count = count($count_list);
        $data = Bootstrap::make($list, $num, $page, $count, false, ['path' => Bootstrap::getCurrentPath(), 'query' => request()->param()]);
        $this->assign('info',$data);
        $arr['sum'] = '';
        foreach ($count_list as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }

    /*
     * 状态报表
     * */
    public function stateReport(Request $request){
        $organization = $request->param('organization');
        $bgdd = $request->param('bgdd');
        $repty_date_start = $request->param('repty_date_start');
        $repty_date_end = $request->param('repty_date_end');
        $where = 'and delete_time is null';
        if(!empty($organization)){
            $where .= ' and organization = '.$organization;
        }
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($repty_date_start)){
            $where .= ' and repty_date >= "'.$repty_date_start.'"';
        }
        if(!empty($repty_date_end)){
            $where .= ' and repty_date <= "'.$repty_date_end.'"';
        }

        $data = [
            'organization' => $organization,
            'bgdd'         => $bgdd,
            'repty_date_start'   => $repty_date_start,
            'repty_date_end'     => $repty_date_end
        ];
        $this->assign('data',$data);
        $info = Db::query('select state,count(id) value, count(id)/(select count(id) from uvclinic_personnels where 1 = 1 '.$where.') proportion from  uvclinic_personnels where 1 = 1 '.$where.' group by state');
        $this->assign('info',$info);
        $arr['sum'] = '';
        foreach ($info as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }

    /*
     * 用工性质报表
     * */
    public function employmentReport(Request $request)
    {
        $organization = $request->param('organization');
        $bgdd = $request->param('bgdd');
        $repty_date_start = $request->param('repty_date_start');
        $repty_date_end = $request->param('repty_date_end');
        $state = $request->param('state');
        $where = 'and delete_time is null';
        if(!empty($organization)){
            $where .= ' and organization = '.$organization;
        }
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($repty_date_start)){
            $where .= ' and repty_date >= "'.$repty_date_start.'"';
        }
        if(!empty($repty_date_end)){
            $where .= ' and repty_date <= "'.$repty_date_end.'"';
        }
        if(!empty($state)){
            $where .= ' and state = "'.$state.'"';
        }

        $data = [
            'organization' => $organization,
            'bgdd'         => $bgdd,
            'repty_date_start'   => $repty_date_start,
            'repty_date_end'     => $repty_date_end,
            'state'        => $state
        ];
        $this->assign('data',$data);
        $info = Db::query("select cn_ygxz,count(id) value, count(cn_ygxz)/(select count(cn_ygxz) from uvclinic_personnels where 1 = 1 and cn_ygxz != ''  $where) proportion	from  uvclinic_personnels where 1 = 1 and cn_ygxz != '' $where group by cn_ygxz");
        $this->assign('info',$info);
        $arr['sum'] = '';
        foreach ($info as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }

    /*
     * 婚姻状况报表
     * */
    public function maritalStatusReport(Request $request){
        $organization = $request->param('organization');
        $bgdd = $request->param('bgdd');
        $repty_date_start = $request->param('repty_date_start');
        $repty_date_end = $request->param('repty_date_end');
        $state = $request->param('state');
        $where = 'and delete_time is null';
        if(!empty($organization)){
            $where .= ' and organization = '.$organization;
        }
        if(!empty($bgdd)){
            $where .= ' and bgdd ="'.$bgdd.'"';
        }
        if(!empty($repty_date_start)){
            $where .= ' and repty_date >= "'.$repty_date_start.'"';
        }
        if(!empty($repty_date_end)){
            $where .= ' and repty_date <= "'.$repty_date_end.'"';
        }
        if(!empty($state)){
            $where .= ' and state = "'.$state.'"';
        }

        $data = [
            'organization' => $organization,
            'bgdd'         => $bgdd,
            'repty_date_start'   => $repty_date_start,
            'repty_date_end'     => $repty_date_end,
            'state'        => $state
        ];
        $this->assign('data',$data);
        $info = Db::query('select cn_hy,count(id) value, count(id)/(select count(id) from uvclinic_personnels where 1 = 1 '.$where.') proportion from  uvclinic_personnels where 1 = 1 '.$where.' group by cn_hy');
        $this->assign('info',$info);
        $arr['sum'] = '';
        foreach ($info as $key => $val){
            $arr['sum'] += $val['value'];
        }
        $this->assign('sum',$arr['sum']);
        return view();
    }
}