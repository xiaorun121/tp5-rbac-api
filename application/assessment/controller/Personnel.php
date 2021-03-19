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
        $this->assign('name',$name);
        $this->assign('code',$code);

        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);
        return view();
    }


    public function personnelSave($id = 0){
        $personnel = new PersonnelModel();
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

    // 导入数据
    public function personnelUpload(){
        if(request() -> isPost())
        {
            vendor("PHPExcel.PHPExcel");
            $objPHPExcel =new \PHPExcel();
            //获取表单上传文件
            $file = request()->file('file');
            if (empty($file)){
                echo "<font color=red>请选择上传文件</font>";
                echo '<a class="layui-btn layui-btn-normal layui-btn-radius" style="display: inline-block;height: 38px;line-height: 38px;padding: 0 18px;background-color: #009688;color: #fff;white-space: nowrap;text-align: center;font-size: 14px;border: none;border-radius: 2px;cursor: pointer;" onclick="javascript:history.go(-1);">返回</a>';
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
                    $info[$k]['is_foreign'] = $v[4];
                    $info[$k]['IDcard'] = $v[5];
                    $info[$k]['sex'] = $v[6];
                    $info[$k]['birth'] = str_replace('/','-',$v[7]);
                    $info[$k]['email'] = $v[8];
                    $info[$k]['phone'] = intval($v[9]);
                    $info[$k]['personal_to_company'] = $v[10];
                    $info[$k]['organization_code'] = intval($v[11]);
                    $info[$k]['organization'] = $v[12];
                    $info[$k]['position_id'] = intval($v[13]);
                    $info[$k]['position'] = $v[14];
                    $info[$k]['part_time_job'] = intval($v[15]);
                    $info[$k]['part_time_job2'] = intval($v[16]);
                    $info[$k]['report_name'] = intval($v[17]);
                    $info[$k]['repty_date'] = str_replace('/','-',$v[18]);
                    $info[$k]['leave_date'] = str_replace('/','-',$v[19]);
                    $info[$k]['staff_type'] = $v[20];
                    $info[$k]['staff_status'] = $v[21];
                    $info[$k]['is_probation'] = $v[22];
                    $info[$k]['is_directory_display'] = $v[23];
                    $info[$k]['probation_start_date'] = str_replace('/','-',$v[24]);
                    $info[$k]['probation_end_date'] = str_replace('/','-',$v[25]);
                    $info[$k]['probation_term'] = intval($v[26]);
                    $info[$k]['attendance_rules'] = $v[27];
                    $info[$k]['probation_rules'] = $v[28];
                    $info[$k]['age'] = intval($v[29]);
                    $info[$k]['leave_quota_rules'] = $v[30];
                    $info[$k]['vacation_use_rules'] = $v[31];
                    $info[$k]['work_overtime_rules'] = $v[32];
                    $info[$k]['repty_first_age'] = intval($v[33]);
                    $info[$k]['is_hc_control'] = $v[34];
                    $info[$k]['leave_entitlement_type'] = $v[35];
                    $info[$k]['shift_type'] = $v[36];
                    $info[$k]['cn_fxqy'] = $v[37];
                    $info[$k]['cn_zply'] = $v[38];
                    $info[$k]['cn_zgxl'] = $v[39];
                    $info[$k]['cn_zgxl_2'] = $v[40];
                    $info[$k]['cn_xw'] = $v[41];
                    $info[$k]['cn_byyx'] = $v[42];
                    $info[$k]['cn_sxzy'] = $v[43];
                    $info[$k]['cn_zzmm'] = $v[44];
                    $info[$k]['cn_hy'] = $v[45];
                    $info[$k]['cn_hj'] = $v[46];
                    $info[$k]['cn_sfzdz'] = $v[47];
                    $info[$k]['cn_xjzddz'] = $v[48];
                    $info[$k]['cn_gjjzh'] = intval($v[49]);
                    $info[$k]['cn_khh'] = $v[50];
                    $info[$k]['cn_zzkh'] = intval($v[51]);
                    $info[$k]['cn_jjlxr'] = $v[52];
                    $info[$k]['cn_jjlxrdh'] = $v[53];
                    $info[$k]['cn_zj'] = intval($v[54]);
                    $info[$k]['cn_is_fsry'] = $v[55];
                    $info[$k]['cn_is_pzj'] = $v[56];
                    $info[$k]['cn_is_bt'] = $v[57];
                    $info[$k]['cn_is_glgz'] = $v[58];
                    $info[$k]['create_time'] = date('y-m-d H:i:s',time());
                    $info[$k]['update_time'] = date('y-m-d H:i:s',time());
                    $info[$k]['user_id'] = session('user.id');
                    $i++;

                }
                if($erri>0){
                    echo "<br><font color=red>以上共".$erri."条数据导入失败</font>";
                }
                if($i>0){
                    echo "<br><font color=red>成功导入".$i."条数据！！！请勿重新导</font>";
                    echo '<a class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>';
                }
                Db::execute('TRUNCATE table uvclinic_personnel');
                $personnel = new PersonnelModel();
                $personnel->insertAll($info);
            }else
            {
                echo $file->getError();
            }
        }
        return view();
    }

    // 导出数据
    public function personnelDownload(){
        $personnel = new PersonnelModel();
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
        $objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BC')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BD')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BE')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BF')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BG')->setWidth(20);



        //设置行高度
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('9')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(22);
        $objPHPExcel->getActiveSheet()->getRowDimension('11')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('12')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('13')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('14')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('15')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('16')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('17')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('18')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('19')->setRowHeight(22);
        $objPHPExcel->getActiveSheet()->getRowDimension('20')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('21')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('22')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('23')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('24')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('25')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('26')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('27')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('28')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('29')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('30')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('31')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('32')->setRowHeight(22);
        $objPHPExcel->getActiveSheet()->getRowDimension('33')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('34')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('35')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('36')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('37')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('38')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('39')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('40')->setRowHeight(22);
        $objPHPExcel->getActiveSheet()->getRowDimension('41')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('42')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('43')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('44')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('45')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('46')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('47')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('48')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('49')->setRowHeight(22);
        $objPHPExcel->getActiveSheet()->getRowDimension('50')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('51')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('52')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('53')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('54')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('55')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('56')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('57')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('58')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('59')->setRowHeight(20);

        //设置水平居中
        // $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        //合并cell
        // $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');

        //长度不够显示的时候 是否自动换行
        // $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setWrapText(true);


        // set table header content
        $objPHPExcel->setActiveSheetIndex(0)
                // ->setCellValue('A1', '总计：'.$count.'条， 总和：'.$sum)
                ->setCellValue('A1', '工号(必填)')
                ->setCellValue('B1', '姓名(必填)')
                ->setCellValue('C1', '拼音')
                ->setCellValue('D1', '英文名')
                ->setCellValue('E1', '是否为外籍(必填)')
                ->setCellValue('F1', '身份证号码(必填)')
                ->setCellValue('G1', '性别(必填)')
                ->setCellValue('H1', '出生日期(必填)')
                ->setCellValue('I1', '邮箱')
                ->setCellValue('J1', '手机')
                ->setCellValue('K1', '公司(必填)')
                ->setCellValue('L1', '部门(必填)')
                ->setCellValue('M1', '部门名称')
                ->setCellValue('N1', '职位(必填)')
                ->setCellValue('O1', '职位名称')
                ->setCellValue('P1', '兼职（1）')
                ->setCellValue('Q1', '兼职（2）')
                ->setCellValue('R1', '汇报人')
                ->setCellValue('S1', '入职日期(必填)')
                ->setCellValue('T1', '离职日期')
                ->setCellValue('U1', '员工类型(必填)')
                ->setCellValue('V1', '员工状态(必填)')
                ->setCellValue('W1', '是否在试用期内(必填)')
                ->setCellValue('X1', '在通讯录中显示(必填)')
                ->setCellValue('Y1', '试用期开始日期')
                ->setCellValue('Z1', '试用期结束日期')
                ->setCellValue('AA1', '试用期期限(月)')
                ->setCellValue('AB1', '考勤规则')
                ->setCellValue('AC1', '试用期规则')
                ->setCellValue('AD1', '年龄')
                ->setCellValue('AE1', '休假额度规则(必填)')
                ->setCellValue('AF1', '休假使用规则(必填)')
                ->setCellValue('AG1', '加班规则(必填)')
                ->setCellValue('AH1', '入职前工龄(月)(必填)')
                ->setCellValue('AI1', '是否占编(必填)')
                ->setCellValue('AJ1', '休假起始类型(必填)')
                ->setCellValue('AK1', '班次类型(必填)')
                ->setCellValue('AL1', '发薪区域(必填)')
                ->setCellValue('AM1', '招聘来源')
                ->setCellValue('AN1', '最高学历(必填)')
                ->setCellValue('AO1', '最高学历2(必填)')
                ->setCellValue('AP1', '学位')
                ->setCellValue('AQ1', '毕业院校(必填)')
                ->setCellValue('AR1', '所学专业(必填)')
                ->setCellValue('AS1', '政治面貌(必填)')
                ->setCellValue('AT1', '婚姻(必填)')
                ->setCellValue('AU1', '户籍')
                ->setCellValue('AV1', '身份证详细地址(必填)')
                ->setCellValue('AW1', '现居住详细住址(必填)')
                ->setCellValue('AX1', '公积金账号')
                ->setCellValue('AY1', '开户行')
                ->setCellValue('AZ1', '工资卡号(必填)')
                ->setCellValue('BA1', '紧急联系人')
                ->setCellValue('BB1', '紧急联系人电话')
                ->setCellValue('BC1', '职级')
                ->setCellValue('BD1', '是否是放射人员(必填)')
                ->setCellValue('BE1', '是否有派驻假(必填)')
                ->setCellValue('BF1', '是否有补贴(必填)')
                ->setCellValue('BG1', '是否有工龄工资(必填)');


        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<count($list);$i++){
            $objPHPExcel->getActiveSheet(0)->setCellValue('A'.($i+2), $list[$i]['code']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('B'.($i+2), $list[$i]['name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('C'.($i+2), $list[$i]['pingyin']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('D'.($i+2), $list[$i]['en_name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('E'.($i+2), $list[$i]['is_foreign']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('F'.($i+2), $list[$i]['IDcard']."\t");
            $objPHPExcel->getActiveSheet(0)->setCellValue('G'.($i+2), $list[$i]['sex']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('H'.($i+2), $list[$i]['birth']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('I'.($i+2), $list[$i]['email']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('J'.($i+2), $list[$i]['phone']."\t");
            $objPHPExcel->getActiveSheet(0)->setCellValue('K'.($i+2), $list[$i]['personal_to_company']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('L'.($i+2), $list[$i]['organization_code']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('M'.($i+2), $list[$i]['organization']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('N'.($i+2), $list[$i]['position_id']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('O'.($i+2), $list[$i]['position']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('P'.($i+2), $list[$i]['part_time_job']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('Q'.($i+2), $list[$i]['part_time_job2']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('R'.($i+2), $list[$i]['report_name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('S'.($i+2), $list[$i]['repty_date']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('T'.($i+2), $list[$i]['leave_date']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('U'.($i+2), $list[$i]['staff_type']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('V'.($i+2), $list[$i]['staff_status']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('W'.($i+2), $list[$i]['is_probation']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('X'.($i+2), $list[$i]['is_directory_display']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('Y'.($i+2), $list[$i]['probation_start_date']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('Z'.($i+2), $list[$i]['probation_end_date']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AA'.($i+2), $list[$i]['probation_term']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AB'.($i+2), $list[$i]['attendance_rules']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AC'.($i+2), $list[$i]['probation_rules']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AD'.($i+2), $list[$i]['age']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AE'.($i+2), $list[$i]['leave_quota_rules']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AF'.($i+2), $list[$i]['vacation_use_rules']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AG'.($i+2), $list[$i]['work_overtime_rules']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AH'.($i+2), $list[$i]['repty_first_age']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AI'.($i+2), $list[$i]['is_hc_control']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AJ'.($i+2), $list[$i]['leave_entitlement_type']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AK'.($i+2), $list[$i]['shift_type']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AL'.($i+2), $list[$i]['cn_fxqy']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AM'.($i+2), $list[$i]['cn_zply']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AN'.($i+2), $list[$i]['cn_zgxl']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AO'.($i+2), $list[$i]['cn_zgxl_2']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AP'.($i+2), $list[$i]['cn_xw']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AQ'.($i+2), $list[$i]['cn_byyx']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AR'.($i+2), $list[$i]['cn_sxzy']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AS'.($i+2), $list[$i]['cn_zzmm']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AT'.($i+2), $list[$i]['cn_hy']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AU'.($i+2), $list[$i]['cn_hj']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AV'.($i+2), $list[$i]['cn_sfzdz']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AW'.($i+2), $list[$i]['cn_xjzddz']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AX'.($i+2), $list[$i]['cn_gjjzh']."\t");
            $objPHPExcel->getActiveSheet(0)->setCellValue('AY'.($i+2), $list[$i]['cn_khh']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('AZ'.($i+2), $list[$i]['cn_zzkh']."\t");
            $objPHPExcel->getActiveSheet(0)->setCellValue('BA'.($i+2), $list[$i]['cn_jjlxr']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('BB'.($i+2), $list[$i]['cn_jjlxrdh']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('BC'.($i+2), $list[$i]['cn_zj']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('BD'.($i+2), $list[$i]['cn_is_fsry']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('BE'.($i+2), $list[$i]['cn_is_pzj']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('BF'.($i+2), $list[$i]['cn_is_bt']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('BG'.($i+2), $list[$i]['cn_is_glgz']);
            $objPHPExcel->getActiveSheet()->getRowDimension($i+2)->setRowHeight(16);
        }

        //  sheet命名
        $objPHPExcel->getActiveSheet()->setTitle('员工信息表');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // excel头参数
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="员工信息表('.date('Y-m-d H:i:s',time()).').xls"');  //日期为文件名后缀
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //excel5为xls格式，excel2007为xlsx格式

        $objWriter->save('php://output');
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
