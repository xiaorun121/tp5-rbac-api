<?php

namespace app\assessment\controller;

use app\assessment\logic\GetViewMenuPermission;
use app\assessment\model\Organization;
use app\assessment\model\Position as PositionModel;
use think\Db;

// 职位信息
class Position extends Common{

    public function positionInfo(){

        $position = new PositionModel();
        $name = input('get.name');
        if($name){

            $positionInfo = $position->where('name','like','%'.$name.'%')
                        ->order('code asc')
                        ->paginate(100,false,[
                        'type'     => 'bootstrap',
                        'var_page' => 'page',
            ]);

        }else{

            $positionInfo = $position->order('code asc')->paginate(100,false,[
                    'type'     => 'bootstrap',
                    'var_page' => 'page',
            ]);
        }

        $this->assign('positionInfo',$positionInfo);
        $this->assign('name',$name);

        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();

        $this->assign('viewMenu',$viewMenu);

        return view();
    }

    public function positionSave($id = 0, $organization_code = 0, $code = 0, $name = '', $is_executive_position = '', $parent_id = 0, $functional = '', $functional_level = '', $status = '', $description = ''){
        $position = new PositionModel();
        if(request()->isPost()){

            if($id != 0){
                $position = $position::get($id);
            }

            $data = [
                'organization_code'         =>   input('post.organization_code'),     // 部门id
                'code'                      =>   input('post.code'),                  // 编码
                'name'                      =>   input('post.name'),                  // 职位名
                'is_executive_position'     =>   input('post.is_executive_position'), // 是否主管职位
                'parent_id'                 =>   input('post.parent_id'),             // 上级职位
                'functional'                =>   input('post.functional'),            // 职能
                'functional_level'          =>   input('post.functional_level'),      // 职能等级
                'status'                    =>   input('post.status'),                // 状态
                'description'               =>   input('post.description'),           // 职位说明
                'user_id'                   =>   session('user.id'),                  // 用户id
            ];


            if($position->save($data) == 1){
                return success('保存成功',url('positionInfo'));
            }else{
                return error('请更新数据！');
            }

        }else{
            $data = [
                'id'                     => $id,
                'organization_code'      => $organization_code,
                'parent_id'              => $parent_id,
                'code'                   => $code,
                'name'                   => $name,
                'status'                 => $status,
                'description'            => $description,
                'is_executive_position'  => $is_executive_position,
                'functional'             => $functional,
                'functional_level'       => $functional_level
            ];

            $this->assign('info',$data);

            $organization = new Organization();
            // 部门
            $organization = $organization::all(function($query){
                $query->order('id asc');
            });

            $organizationArr = get_tree($organization);

            // 上级职位
            $position = $position->field('id,name,code,organization_code')->order('code asc')->select();

            $this->assign('position',$position);
            $this->assign('organizationInfo',$organizationArr);

            //录属城市
            // $cityInfo = Db::name('city_view')->Distinct(true)->field('name')->select();
            //
            // $this->assign('cityInfo',$cityInfo);
            return view();
        }
    }

    // 导入数据
    public function positionUpload(){
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
                    $info[$k]['organization_code'] = intval($v[0]);
                    $info[$k]['code'] = intval($v[2]);
                    $info[$k]['name'] = $v[3];
                    $info[$k]['parent_id'] = intval($v[4]);
                    $info[$k]['is_executive_position'] = $v[6];
                    $info[$k]['functional'] = $v[7];
                    $info[$k]['functional_level'] = $v[8];
                    $info[$k]['status'] = $v[9];
                    $info[$k]['description'] = $v[10];
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
                }
                Db::execute('TRUNCATE table uvclinic_position');
                $position = new PositionModel();
                $position->insertAll($info);
            }else
            {
                echo $file->getError();
            }
        }
        return view();
    }

    // 导出数据
    public function positionDownload(){
        $position = new PositionModel();
        $list = $position->order('code asc')->select();

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
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(60);


        //设置行高度
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('9')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('11')->setRowHeight(20);

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
        $objPHPExcel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //合并cell
        // $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');

        //长度不够显示的时候 是否自动换行
        $objPHPExcel->getActiveSheet()->getStyle('K')->getAlignment()->setWrapText(true);


        // set table header content
        $objPHPExcel->setActiveSheetIndex(0)
                // ->setCellValue('A1', '总计：'.$count.'条， 总和：'.$sum)
                ->setCellValue('A1', '组织编码（必填）')
                ->setCellValue('B1', '组织名称')
                ->setCellValue('C1', '职位编码（必填）')
                ->setCellValue('D1', '职位名称（必填）')
                ->setCellValue('E1', '上级职位编码')
                ->setCellValue('F1', '上级职位名称')
                ->setCellValue('G1', '主管职位（必填）')
                ->setCellValue('H1', '职能')
                ->setCellValue('I1', '职能等级')
                ->setCellValue('J1', '状态')
                ->setCellValue('K1', '职位说明');


        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<count($list);$i++){
            $objPHPExcel->getActiveSheet(0)->setCellValue('A'.($i+2), $list[$i]['organization_code']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('B'.($i+2), showPositionToOrganization($list[$i]['organization_code']));
            $objPHPExcel->getActiveSheet(0)->setCellValue('C'.($i+2), $list[$i]['code']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('D'.($i+2), $list[$i]['name']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('E'.($i+2), $list[$i]['parent_id'] == 0 ? '' : $list[$i]['parent_id']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('F'.($i+2), showPositionToParentName($list[$i]['parent_id']));
            $objPHPExcel->getActiveSheet(0)->setCellValue('G'.($i+2), $list[$i]['is_executive_position']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('H'.($i+2), $list[$i]['functional']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('I'.($i+2), $list[$i]['functional_level']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('J'.($i+2), $list[$i]['status']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('K'.($i+2), $list[$i]['description']);
            $objPHPExcel->getActiveSheet()->getRowDimension($i+2)->setRowHeight(16);
        }

        //  sheet命名
        $objPHPExcel->getActiveSheet()->setTitle('职位信息表');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        $date = date('Y-m-d H:i:s',time());
        // excel头参数
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="职位信息表('.$date.').xls"');  //日期为文件名后缀
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //excel5为xls格式，excel2007为xlsx格式

        $objWriter->save('php://output');
    }

    public function delPosition(){
        $id = input('post.id');

        $position = new PositionModel();
        $res = $position::destroy($id);
        if($res == 1){
            echo json_encode(['status'=>'success','code'=>200,'msg'=>'删除成功']);
        }else{
            echo json_encode(['status'=>'error','code'=>201,'msg'=>'删除失败']);
        }
    }
}
