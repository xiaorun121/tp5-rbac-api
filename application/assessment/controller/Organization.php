<?php
namespace app\assessment\controller;

use think\Controller;
use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\Organization as OrganizationModel;
use app\assessment\model\Province;
use app\assessment\model\City;
use think\Db;

// 组织机构
class Organization extends Common{

    public function organizationInfo(){
        $organization = new OrganizationModel();

        $name      = input('get.name');
        $parent_id = input('get.parent_id');
        if($parent_id == 0){
            if($name){

                $organizationInfo = $organization->where('name','like','%'.$name.'%')
                            ->order('code asc')
                            ->paginate(100,false,[
                            'type'     => 'bootstrap',
                            'var_page' => 'page',
                ]);

            }else{

                $organizationInfo = $organization->order('code asc')->paginate(100,false,[
                        'type'     => 'bootstrap',
                        'var_page' => 'page',
                ]);
            }
        }else{
            if($name){

                $organizationInfo = $organization->where('name','like','%'.$name.'%')
                            ->where('parent_id',$parent_id)
                            ->order('code asc')
                            ->paginate(200,false,[
                            'type'     => 'bootstrap',
                            'var_page' => 'page',
                ]);

            }else{

                $organizationInfo = $organization
                        ->order('code asc')
                        ->where('parent_id',$parent_id)
                        ->paginate(200,false,[
                        'type'     => 'bootstrap',
                        'var_page' => 'page',
                ]);
            }
        }


        $this->assign('organizationInfo',$organizationInfo);

        $this->assign('name',$name);
        $this->assign('parent_id',$parent_id);
        $this->assign('info',$info);

        $organization_names = $organization->where('char_length(`code`) <=2')->field('id,name,parent_id')->select();
        $this->assign('organization_names',$organization_names);

        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);

        return view();
    }

    public function organizationSave($id = 0,$name = '',$description = '',$code = 0, $parent_id = 0,$type = '',$status = 0,$responsible = '',$kpi_department = ''){
        $organization = new OrganizationModel();
        if(request()->isPost()){

            if($id != 0){
                $organization = $organization::get($id);
            }

            $province = input('post.province');
            $city = input('post.city');

            $data = [
                'parent_id'      => input('post.parent_id'),
                'code'           => input('post.code'),
                'name'           => input('post.name'),
                'type'           => input('post.type'),
                'status'         => input('post.status'),
                'responsible'    => input('post.responsible'),
                'kpi_department' => input('post.kpi_department'),
                'description'    => input('post.description'),
                'user_id'        => session('user.id'),
            ];

            if($organization->save($data) == 1){
                return success('保存成功',url('organizationInfo'));
            }else{
                return error('请更新数据！');
            }

        }else{
            $data = [
                'id'             => $id,
                'parent_id'      => $parent_id,
                'code'           => $code,
                'name'           => $name,
                'type'           => $type,
                'status'         => $status,
                'responsible'    => $responsible,
                'kpi_department' => $kpi_department,
                'description'    => $description,
            ];

            $this->assign('info',$data);

            $organization = $organization::all(function($query){
                $query->order('id asc');
            });

            $organizationArr = get_tree($organization);

            $this->assign('organizationinfo',$organizationArr);

            $province = new Province();
            $provinceInfo = $province->select();
            $this->assign('provinceInfo',$provinceInfo);
            return view();
        }
    }

    public function getCity(){
        if(request()->isPost()){
            $province_name = input('post.province');
            $province = new Province();
            $id = $province->where('name',$province_name)->value('id');

            $city = new City();
            $cityInfo = $city->where('province_id',$id)->select();
            if($cityInfo){
                echo json_encode(['code'=>200,'status'=>'success','data'=>$cityInfo]);
            }else{
                echo json_encode(['code'=>500,'status'=>'error']);
            }
        }
    }

    // 导入数据
    public function organizationUpload(){
        if(request() -> isPost())
        {
            vendor("PHPExcel.PHPExcel");
            $objPHPExcel =new \PHPExcel();
            //获取表单上传文件
            $file = request()->file('file');
            if (empty($file)){
                echo "<font color=red>请选择上传文件</font>";
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
                    $info[$k]['id'] = intval($v[0]);
                    $info[$k]['code'] = intval($v[1]);
                    $info[$k]['name'] = $v[2];
                    $info[$k]['parent_id'] = showOrganizationParentId($v[1],$v[2],$v[3]);
                    $info[$k]['type'] = $v[4];
                    $info[$k]['status'] = $v[5];
                    $info[$k]['responsible'] = $v[6];
                    $info[$k]['kpi_department'] = $v[7];
                    $info[$k]['description'] = $v[8];
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
                Db::execute('TRUNCATE table uvclinic_organization');
                $organization = new OrganizationModel();
                $organization->insertAll($info);
            }else
            {
                echo $file->getError();
            }
        }
        return view();
    }

    // 导出数据
    public function organizationDownload(){
        $organization = new OrganizationModel();
        $list = $organization->order('code asc')->select();

        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel();

        $objPHPExcel->getProperties()->setCreator("ctos")
            ->setLastModifiedBy("ctos")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(60);


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

        //设置水平居中
        // $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //合并cell
        // $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');

        //长度不够显示的时候 是否自动换行
        $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setWrapText(true);


        // set table header content
        $objPHPExcel->setActiveSheetIndex(0)
                // ->setCellValue('A1', '总计：'.$count.'条， 总和：'.$sum)
                ->setCellValue('A1', '序号')
                ->setCellValue('B1', '组织编码')
                ->setCellValue('C1', '组织名称')
                ->setCellValue('D1', '上级组织单元')
                ->setCellValue('E1', '组织类型')
                ->setCellValue('F1', '组织状态')
                ->setCellValue('G1', '部门负责人')
                ->setCellValue('H1', '录入KPI考核')
                ->setCellValue('I1', '组织说明');


        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<count($list);$i++){
            $objPHPExcel->getActiveSheet(0)->setCellValue('A'.($i+2), $list[$i]['id']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('B'.($i+2), $list[$i]['code']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('C'.($i+2), $list[$i]['name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('D'.($i+2), showParentOrganization($list[$i]['parent_id']));
            $objPHPExcel->getActiveSheet(0)->setCellValue('E'.($i+2), $list[$i]['type']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('F'.($i+2), $list[$i]['status']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('G'.($i+2), $list[$i]['responsible']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('H'.($i+2), $list[$i]['kpi_department']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('I'.($i+2), $list[$i]['description']);
            $objPHPExcel->getActiveSheet()->getRowDimension($i+2)->setRowHeight(16);
        }

        //  sheet命名
        $objPHPExcel->getActiveSheet()->setTitle('组织信息表');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // excel头参数
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="组织信息表('.date('Y-m-d H:i:s',time()).').xls"');  //日期为文件名后缀
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //excel5为xls格式，excel2007为xlsx格式

        $objWriter->save('php://output');
    }

    // 删除组织信息
    public function delOrganization(){
        $id = input('post.id');

        $organization = new OrganizationModel();
        $res = $organization::destroy($id);
        if($res == 1){
            echo json_encode(['status'=>'success','code'=>200,'msg'=>'删除成功']);
        }else{
            echo json_encode(['status'=>'error','code'=>201,'msg'=>'删除失败']);
        }
    }
}
