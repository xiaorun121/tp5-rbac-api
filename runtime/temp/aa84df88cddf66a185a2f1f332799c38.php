<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy_pro\WWW\shwap/application/assessment\view\position\positioninfo.html";i:1615534606;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>职位信息</title>
    <link href="__HOME__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__HOME__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__HOME__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">

    <link href="__HOME__/css/animate.min.css" rel="stylesheet">
    <link href="__HOME__/css/layer.css" rel="stylesheet">
    <link href="__HOME__/css/global.css" rel="stylesheet">
    <link href="__HOME__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
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

                                      <?php if(in_array((职位信息新增), is_array($viewMenu)?$viewMenu:explode(',',$viewMenu))): ?>
                                      <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                          <a class="layui-btn" id="add" href='<?php echo url("positionsave"); ?>'><i class="layui-icon">&#xe608;</i> 添加</a>
                                      </div>
                                      <?php endif; if(in_array((导入数据), is_array($viewMenu)?$viewMenu:explode(',',$viewMenu))): ?>
                                      <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                          <a class="layui-btn" id="add" href='<?php echo url("positionupload"); ?>'><i class="fa fa-cloud-upload"></i> 导入</a>
                                      </div>
                                      <?php endif; if(in_array((导出数据), is_array($viewMenu)?$viewMenu:explode(',',$viewMenu))): ?>
                                      <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                          <a class="layui-btn" id="add" href='<?php echo url("positiondownload"); ?>'><i class="fa fa-cloud-download"></i> 导出</a>
                                      </div>
                                      <?php endif; ?>
                                    </div>
                                    <form action="<?php echo url('positionInfo'); ?>" method="get">
                                        <div class="columns columns-right btn-group pull-right">
                                              <button class="btn btn-default btn-outline" type="submit" title="搜索"><i class="fa fa-search"></i></button>
                                        </div>
                                        <div class="pull-right search">
                                          <input class="form-control input-outline" type="text" name="name" value="<?php if($name): ?><?php echo $name; endif; ?>" placeholder="职位名称">
                                        </div>
                                    </form>
                                  </div>

                                  <div id="editable_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <table class="table table-striped table-bordered table-hover  dataTable" id="editable" aria-describedby="editable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="序号" width="5%">序号</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="职位编码">职位编码</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="职位名称">职位名称</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="职位名称">所属部门</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="上级职位">上级职位</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="主管职位">主管职位</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="职能">职能</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="职能等级">职能等级</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="职位状态">职位状态</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="职位说明">职位说明</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="操作" width="9%">操作</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                          <?php if(is_array($positionInfo) || $positionInfo instanceof \think\Collection || $positionInfo instanceof \think\Paginator): $k = 0; $__LIST__ = $positionInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                                              <tr class="gradeA odd" id="d<?php echo $v['id']; ?>">
                                                  <td class="sorting_1"><?php echo $v['id']; ?></td>
                                                  <td class=" "><?php echo $v['code']; ?></td>
                                                  <td class=" "><?php echo $v['name']; ?></td>
                                                  <td class=" "><?php echo showPositionToOrganization($v['organization_code']); ?></td>
                                                  <td class=" "><?php echo showPositionToParentName($v['parent_id']); ?></td>
                                                  <td class=" "><?php echo $v['is_executive_position']; ?></td>
                                                  <td class=" "><?php echo $v['functional']; ?></td>
                                                  <td class=" "><?php echo $v['functional_level']; ?></td>
                                                  <td class=" "><?php echo $v['status']; ?></td>
                                                  <td class=" "><?php echo $v['description']; ?></td>

                                                  <td class="center " style="height:20px">
                                                      <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                                          <?php if(in_array((职位信息修改), is_array($viewMenu)?$viewMenu:explode(',',$viewMenu))): ?>
                                                              <a type="button" class="layui-btn" href="<?php echo url('positionsave'); ?>?id=<?php echo $v['id']; ?>&name=<?php echo $v['name']; ?>&code=<?php echo $v['code']; ?>&parent_id=<?php echo $v['parent_id']; ?>&status=<?php echo $v['status']; ?>&description=<?php echo $v['description']; ?>&organization_code=<?php echo $v['organization_code']; ?>&is_executive_position=<?php echo $v['is_executive_position']; ?>&functional=<?php echo $v['functional']; ?>&functional_level=<?php echo $v['functional_level']; ?>" title="修改" style="height: 24px;line-height: 24px;padding: 0px 8px;"><i class="layui-icon">&#xe642;</i></a>
                                                          <?php endif; if(in_array((职位信息删除), is_array($viewMenu)?$viewMenu:explode(',',$viewMenu))): ?>
                                                              <button type="button" class="layui-btn layui-btn-danger" onclick="buttonDel(<?php echo $v['id']; ?>);" title="删除" style="height: 24px;line-height: 24px;padding: 0px 8px;"><i class="layui-icon">&#xe640;</i></button>
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
                                          <?php echo $positionInfo->render(); ?>
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

      // 删除
      function buttonDel(id){
        layer.msg('您确定要删除吗？', {
            time: 0 //不自动关闭
            ,btn: ['确认', '取消']
            ,yes: function(index){
                layer.close(index);
                $.ajax({
                    url:'<?php echo url("delPosition"); ?>',
                    data:{id:id},
                    type:'POST',
                    dataType:'json',
                    success:function(data){
                        if(data.status == 'success'){
                            layer.msg(data.msg,{icon: 1},function(){
                                setTimeout(function(){
                                    $('#d'+id).html('');
                                }, 100);
                            });
                        }else{
                            layer.msg(data.msg,{icon: 2});
                        }

                    },
                    error:function(){
                        layer.msg("请求失败");
                    }
                })
            }
        });
      }
</script>
</body>
</html>
