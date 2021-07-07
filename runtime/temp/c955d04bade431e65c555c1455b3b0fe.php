<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\kpi\kpidepartmentlist.html";i:1615533990;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KPI考核</title>
    <link href="__HOME__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__HOME__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__HOME__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">

    <link href="__HOME__/css/animate.min.css" rel="stylesheet">
    <link href="__HOME__/css/layer.css" rel="stylesheet">
    <link href="__HOME__/css/global.css" rel="stylesheet">
    <link href="__HOME__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="__LAYUI__/css/layui.css" media="all">
    <!-- <link href="__HOME__/css/awesome-bootstrap-checkbox.css" rel="stylesheet"> -->

<style>
  html{background-color:#E3E3E3; font-size:14px; color:#000; font-family:Helvetica Neue,Helvetica,PingFang SC,Tahoma,Arial,sans-serif}
  a,a:hover{ text-decoration:none;}
  pre{font-family:Helvetica Neue,Helvetica,PingFang SC,Tahoma,Arial,sans-serif}
  .box{padding:20px; background-color:#fff; margin:50px 100px; border-radius:5px;}
  .box a{padding-right:15px;}
  #about_hide{display:none}
  .layer_text{background-color:#fff; padding:20px;}
  .layer_text p{margin-bottom: 10px; text-indent: 2em; line-height: 23px;}
  .button{display:inline-block; *display:inline; *zoom:1; line-height:30px; padding:0 20px; background-color:#56B4DC; color:#fff; font-size:14px; border-radius:3px; cursor:pointer; font-weight:normal;}
  .photos-demo img{width:200px;}
  thead tr th{text-align: center;}
  tbody tr td{text-align: center;}
  .table>thead>tr>th{line-height: 30px;}
  select{
    background-color: #FFF;
    background-image: none;
    border: 1px solid #e5e6e7;
    border-radius: 1px;
    color: inherit;
    padding: 10px;
    -webkit-transition: border-color .15s ease-in-out 0s,box-shadow .15s ease-in-out 0s;
    transition: border-color .15s ease-in-out 0s,box-shadow .15s ease-in-out 0s;
    font-size: 14px;
  }
  </style>

</head>
<body class="gray-bg" onload="opener.location.reload()">

<div class="wrapper wrapper-content animated fadeInUp" style="font-size: 13px;padding:15px">
   <div class="ibox float-e-margins">
     <div class="ibox-content">
        <div class="row row-lg">
           <div class="col-sm-12">
                        <!-- Example Events -->
                        <div class="example-wrap">
                            <div class="example">

                                <div class="bootstrap-table">
                                  <div class="fixed-table-toolbar">
                                    <div class="bars pull-left">
                                    </div>
                                    <form action="<?php echo url('kpiDepartmentList'); ?>" method="get">
                                        <div class="columns columns-right btn-group pull-right">
                                              <button class="btn btn-default btn-outline" type="submit" title="搜索"><i class="fa fa-search"></i></button>
                                        </div>
                                        <div class="pull-right search">
                                          <input class="form-control input-outline" type="text" name="name" value="<?php if($name): ?><?php echo $name; endif; ?>" placeholder="用户名">
                                        </div>
                                    </form>
                                  </div>

                                  <div id="editable_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <table class="table table-striped table-bordered table-hover  dataTable" id="editable" aria-describedby="editable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="序号" width="5%">序号</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="部门名称" width="20%">部门名称</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="部门负责人">部门负责人</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="创建时间">创建时间</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="考评周期">考评周期</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="操作" width="9%">操作</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                          <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                                              <tr class="gradeA odd" id="d{v.id}">
                                                  <td class="sorting_1"><?php echo $v['id']; ?></td>
                                                  <td class=" "><?php echo $v['name']; ?></td>
                                                  <td class=" "><?php echo $v['responsible']; ?></td>
                                                  <td class=" "><?php echo $v['create_time']; ?></td>
                                                  <td class=" " width="30%">
                                                    <div class="layui-inline">
                                                        <label class="layui-form-label" style="width:100px">年月选择器</label>
                                                        <select name="evaluation_cycle" id="evaluation_cycle">
                                                            <?php if(is_array($evaluation_cycle_info) || $evaluation_cycle_info instanceof \think\Collection || $evaluation_cycle_info instanceof \think\Paginator): $i = 0; $__LIST__ = $evaluation_cycle_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                                                <option value="<?php echo $vv['evaluation_cycle']; ?>"><?php echo $vv['evaluation_cycle']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                        <select name="tomonth" id="tomonth">
                                                            <?php if(is_array($month) || $month instanceof \think\Collection || $month instanceof \think\Paginator): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <option value="<?php echo $vo['month']; ?>"><?php echo $vo['month']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                    </div>
                                                  </td>

                                                  <td class="center " style="height:20px">
                                                      <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                                          <?php if(in_array((考核), is_array($viewMenu)?$viewMenu:explode(',',$viewMenu))): ?>
                                                          <a  class="layui-btn" onclick="kpiAssessment(<?php echo $v['id']; ?>,'<?php echo $v['name']; ?>','<?php echo $v['responsible']; ?>')" title="KPI考核" style="height: 24px;line-height: 24px;padding: 0px 8px;"><i class="fa fa-cog"></i></a>
                                                          <?php endif; ?>
                                                      </div>
                                                  </td>
                                              </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                      </tbody>
                                 </table>
                                 <div class="row">

                                     <div class="col-sm-6">
                                       <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
                                            <?php echo $info->render(); ?>
                                       </div>
                                     </div>
                                 </div>
                               </div>
                          </div>
                          <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- End Example Events -->
                    </div>
        </div>
      </div>
    </div>

</div>
<script src="__HOME__/js/jquery.min.js"></script>
<script src="__JS__/layer.js"></script>
<script src="__HOME__/js/laydate.js"></script>


<script type="text/javascript">

      function clickDate(id){
          laydate.render({
              elem: '#test1',
              type: 'month'
          });
      }


      function kpiAssessment(id,name,responsible){
          var evaluation_cycle = $('#evaluation_cycle').val();
          var month = $('#tomonth').val();
          location.href = "<?php echo url('kpiAssessment'); ?>?kpi_department_id="+id+"&department_name="+name+"&responsible="+responsible+"&evaluation_cycle="+evaluation_cycle+"&month="+month
          // href="<?php echo url('kpiAssessment'); ?>?kpi_department_id=<?php echo $v['id']; ?>&department_name=<?php echo $v['name']; ?>&responsible=<?php echo $v['responsible']; ?>"
      }
</script>
</body>
</html>
